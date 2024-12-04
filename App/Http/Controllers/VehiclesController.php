<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mod;
use App\Models\Vehicle;
use Illuminate\View\View;

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

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function store()
    {
        
    }
}