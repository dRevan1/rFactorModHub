<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModsController extends Controller
{
    
    public function index(string $mod_type)
    {
        if ($mod_type == "vehicle" || $mod_type == "track" || $mod_type == "other") {
            return view("mods.mods", ['mods' => Mod::all()]);
        } else {

        }
    }

    public function create(string $mod_type)
    {
        if ($mod_type == "vehicle" || $mod_type == "track" || $mod_type == "other") {
            return view("mods.create", ['categories' => Category::all(), 'mod_type' => $mod_type]);
        } else {

        }
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
                ? $path = 'storage/' . $request->file('thumbnail')->store('mods/thumbnails', 'public')
                : "images/car_thumbnail.jpg";

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;
        $data['author'] = request()->user()->name;
        $data['downloads'] = 0;
        $data['likes'] = 0;

        $mod = Mod::create($data);
        return redirect()->route('mod.show', $mod);
    }

    public function show(Mod $mod)
    {
        return view("mods.mod", ['mod' => $mod]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mod $mod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mod $mod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mod $mod)
    {
        //
    }
}
