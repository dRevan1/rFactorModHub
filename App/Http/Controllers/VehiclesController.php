<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class VehiclesController extends Controller
{

    public function index() 
    {
        return view("vehicles.vehicles", ['vehicles' => Vehicle::all()]);
    }

    public function create()
    {
        return view('mod.create');
    }

    public function show(Vehicle $vehicle)
    {
        return view("mod.mod", ['vehicle' => $vehicle]);
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->author !== request()->user()->name) {
            abort(403);
        }
        $relativePath = str_replace('storage/', '', $vehicle->thumbnail);
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
        $vehicle->delete();

        return redirect()->route('vehicle.index');
    }

    public function edit(Vehicle $vehicle)
    {
        if ($vehicle->author !== request()->user()->name) {
            abort(403);
        }

        return view('mod.edit', ['vehicle'=> $vehicle]);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        if ($vehicle->author !== request()->user()->name) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'category' => ['required', 'string', 'in:F1,F2,F3,F4,GT2,GT3,GT4,LMP3,LMP2,Hypercar,Other'],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);

        if ($vehicle->thumbnail != "images/car_thumbnail.jpg") {
            $relativePath = str_replace('storage/', '', $vehicle->thumbnail);
            Storage::disk('public')->delete($relativePath);
        }
        $path = ($request->file('thumbnail')) 
                ? $path = 'storage/' . $request->file('thumbnail')->store('vehicles/thumbnails', 'public')
                : "images/car_thumbnail.jpg";

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;
        $vehicle->update($data);
        return redirect()->route('vehicle.show', $vehicle);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'category' => ['required', 'string', 'in:F1,F2,F3,F4,GT2,GT3,GT4,LMP3,LMP2,Hypercar,Other'],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);
        $path = ($request->file('thumbnail')) 
                ? $path = 'storage/' . $request->file('thumbnail')->store('vehicles/thumbnails', 'public')
                : "images/car_thumbnail.jpg";

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;
        $data['author'] = request()->user()->name;
        $data['downloads'] = 0;
        $data['likes'] = 0;

        $vehicle = Vehicle::create($data);
        return redirect()->route('vehicle.show', $vehicle);

        //$vehicle = Vehicle::where('name', $data['name'])
        //->where('author', request()->user()->name)->first();
        //if ($vehicle) {
        //    return redirect()->back()->withErrors(['name' => 'You already have a vehicle with this name']);
        //}
    }
}