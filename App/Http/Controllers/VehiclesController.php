<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mod;
use Illuminate\View\View;

class VehiclesController extends Controller
{

    public function index() 
    {
        $mod = new Mod();
        $mod->setTable('vehicles');
        return view("vehicles.vehicles", ['vehicleList' => $mod::all()]);

    }

    public function create()
    {
        
    }

    public function show()
    {
        
    }

    public function delete()
    {
        
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