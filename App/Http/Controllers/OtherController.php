<?php

namespace App\Http\Controllers;

use App\Models\Other;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class OtherController extends Controller
{
    
    public function index()
    {
        return view("others.others", ['others' => Other::all()]);
    }

    
    public function create()
    {
        return view("others.create");
    }

    
    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'category' => ['required', 'string', 'in:Skins,Sounds,HUD,Other'],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);
        $path = ($request->file('thumbnail')) 
                ? $path = $request->file('thumbnail')->store('others/thumbnails', 'public')
                : "";

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['author'] = request()->user()->name;
        $data['thumbnail'] = $path;
        $data['downloads'] = 0;
        $data['likes'] = 0;

        $other = Other::create($data);
        return redirect()->route('others.show', $other);
    }

    
    public function show(Other $other)
    {
        return view("others.other", ['other'=> $other]);
    }

   
    public function edit(Other $other)
    {
        if ($other->author !== request()->user()->name) {
            abort(403);
        }

        return view("others.edit", ['other' => $other]);
    }

   
    public function update(Request $request, Other $other)
    {
        if ($other->author !== request()->user()->name) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'category' => ['required', 'string', 'in:Skins,Sounds,HUD,Other'],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);
        if ($other->thumbnail != "") {
            Storage::disk('public')->delete($other->thumbnail);
        }
        $path = ($request->file('thumbnail')) 
                ? $path = $request->file('thumbnail')->store('others/thumbnails', 'public')
                : "";

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;

        $other->update($data);
        return redirect()->route('others.show', $other);
    }

   
    public function destroy(Other $other)
    {
        if ($other->author !== request()->user()->name) {
            abort(403);
        }
        if ($other->thumbnail && Storage::disk('public')->exists($other->thumbnail)) {
            Storage::disk('public')->delete($other->thumbnail);
        }
        $other->delete();
        return redirect()->route('others.index');
    }
}
