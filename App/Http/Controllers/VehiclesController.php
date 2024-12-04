<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{

    public function index() 
    {
        return view("vehicles.vehicles", ['vehicles' => Vehicle::all(), 'index' => 0]);
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
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string'],
            'category' => ['required', 'string'],
            'file' => ['required', 'file']
        ]);
        $data['author'] = request()->user()->name;
        $data['downloads'] = 0;
        $data['likes'] = 0;

        $vehicle = Vehicle::create($data);
        return redirect()->route('vehicle.show', $vehicle);
    }
}