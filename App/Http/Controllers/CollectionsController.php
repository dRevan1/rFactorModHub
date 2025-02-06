<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Mod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Storage;

class CollectionsController extends Controller
{
    public function get_user_collections(Request $request, string $username) {

        $isAuthor = Auth::check() && $request->user()->name === $username;
        $collections = Collection::where('author', '=', $username)->get();
        $collections_list = view('profile.partials.collections-list', 
                         ['collections' => $collections, 'isAuthor' => $isAuthor, 'username' => $username])->render();

        return response()->json([
            'collections_list' => $collections_list
        ]);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['string', 'nullable'],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);
        $path = ($request->file('thumbnail')) 
                ? $path = 'storage/' . $request->file('thumbnail')->store('collections/thumbnails', 'public')
                : "images/car_thumbnail.jpg";

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;
        $data['author'] = request()->user()->name;
        $data['mod_count'] = 0;

        Collection::create($data);
        return response()->json([
            'message' => 'Collection created successfully!',
        ]);
    }


    public function show(string $collection_name, string $author)
    {
        $collection = Collection::where([
            ['author', '=', $author],
            ['name', '=', $collection_name]
        ])->first();

        $isAuthor = Auth::check() && request()->user()->name === $author;
        $mods = $collection->mods;
        $collection_mods = view('profile.partials.collection-mods-profile', 
                         ['mods' => $mods, 'isAuthor' => $isAuthor, 'collection' => $collection])->render();

        return response()->json([
            'collection_mods' => $collection_mods
        ]);

    }

    public function edit(Collection $collection)
    {
        if ($collection->author !== request()->user()->name) {
            abort(403);
        }
        $mods_in_collection = $collection->mods;

        return view("profile.collection-edit", ['collection' => $collection, 
                           'mods' => $mods_in_collection]);
    }

    public function update(Request $request, Collection $collection)
    {
        if ($collection->author !== request()->user()->name) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['string', 'nullable'],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);

        if ($collection->thumbnail != "images/car_thumbnail.jpg") {
            $relativePath = str_replace('storage/', '', $collection->thumbnail);
            Storage::disk('public')->delete($relativePath);
        }
        $path = ($request->file('thumbnail')) 
                ? $path = 'storage/' . $request->file('thumbnail')->store('mods/thumbnails', 'public')
                : "images/car_thumbnail.jpg";

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;
        $collection->update($data);
        return redirect()->route('profile.show', $request->user());
    }

    public function destroy(Collection $collection)
    {
        if ($collection->author !== request()->user()->name) {
            abort(403);
        }
        $relativePath = str_replace('storage/', '', $collection->thumbnail);
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
        $collection->delete();

        return redirect()->route('profile.show', request()->user());
    }
}
