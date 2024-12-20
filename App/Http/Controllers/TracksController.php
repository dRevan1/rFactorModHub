<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TracksController extends Controller
{
   
    public function index() 
    {
        return view("tracks.tracks", ['tracks' => Track::all()]);

    }

    public function create()
    {
        return view('tracks.create');
    }

    public function show(Track $track)
    {
        return view("tracks.track", ['track' => $track]);
    }

    public function destroy(Track $track)
    {
        if ($track->author !== request()->user()->name) {
            abort(403);
        }
        $track->delete();

        return redirect()->route('track.index');
    }

    public function edit(Track $track)
    {
        if ($track->author !== request()->user()->name) {
            abort(403);
        }

        return view("tracks.edit", ["track"=> $track]);
    }

    public function update(Request $request, Track $track)
    {
        if ($track->author !== request()->user()->name) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'file' => ['required', 'file']
        ]);
        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');

        $track->update($data);
        return redirect()->route('track.show', $track);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }
        
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'file' => ['required', 'file']
        ]);

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['author'] = $request->user()->name;
        $data['downloads'] = 0;
        $data['likes'] = 0;

        $track = Track::create($data);
        return redirect()->route('track.show', $track);
    }
}