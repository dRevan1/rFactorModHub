<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mod;
use Illuminate\View\View;

class TracksController extends Controller
{
   
    public function index() 
    {
        $mod = new Mod();
        $mod->setTable('tracks');
        return view("tracks.tracks", ['trackList' => $mod::all()]);

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