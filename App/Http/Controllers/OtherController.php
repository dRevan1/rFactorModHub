<?php

namespace App\Http\Controllers;

use App\Models\Other;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'file' => ['required', 'file']
        ]);

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['author'] = request()->user()->name;
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
            'file' => ['required', 'file']
        ]);
        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');

        $other->update($data);
        return redirect()->route('others.show', $other);
    }

   
    public function destroy(Other $other)
    {
        if ($other->author !== request()->user()->name) {
            abort(403);
        }
        $other->delete();
        return redirect()->route('others.index');
    }
}
