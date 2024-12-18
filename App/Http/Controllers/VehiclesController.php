<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'description' => ['string'],
            'category' => ['required', 'string'],
            'file' => ['required', 'file']
        ]);
        
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
            'description' => ['string'],
            'category' => ['required', 'string'],
            'file' => ['required', 'file']
        ]);

        //$vehicle = Vehicle::where('name', $data['name'])
        //->where('author', request()->user()->name)->first();
        //if ($vehicle) {
        //    return redirect()->back()->withErrors(['name' => 'You already have a vehicle with this name']);
        //}

        $data['author'] = request()->user()->name;
        $data['downloads'] = 0;
        $data['likes'] = 0;

        $vehicle = Vehicle::create($data);
        return redirect()->route('vehicle.show', $vehicle);
    }
}