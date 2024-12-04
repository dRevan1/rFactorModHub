<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mod;
use Illuminate\View\View;

class ModController extends Controller
{


    public function index($table) 
    {
        $mod = new Mod();
        $mod->setTable($table);
        return Mod::all();

    }

    public function create()
    {
        return view("mod.create");
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