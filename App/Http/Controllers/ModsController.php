<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Storage;

class ModsController extends Controller
{
    
    public function index(Request $request)
    {
        $mod_type = $request->query("mod_type");
        if ($mod_type == "vehicle" || $mod_type == "track" || $mod_type == "other") {
            $title = ucfirst($mod_type) . "s";
            $categories = Category::where('mod_type', $mod_type)->pluck('name');
            return view("mods.mods", ['mods' => Mod::where('type', $mod_type)->get(),
                                                  'categories' => $categories, 
                                                  'title' => $title,
                                                  'mod_type' => $mod_type]);
        }
    }

    public function create(Request $request)
    {
        $mod_type = $request->query("mod_type");
        if ($mod_type == "vehicle" || $mod_type == "track" || $mod_type == "other") {
            $categories = Category::where('mod_type', $mod_type)->pluck('name');
            return view("mods.create", ['categories' => $categories, 'mod_type' => $mod_type]);
        }
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $mod_type = $request->validate(['type' => ['string', 'required', 'in:vehicle,track,other']])['type'];
        $categories = $this->get_categories($mod_type);

        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'category' => ['required', 'string', Rule::in($categories)],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);
        $thumbnail = $this->get_default_thumbnail($data['type']);
        $path = ($request->file('thumbnail')) 
                ? $path = 'storage/' . $request->file('thumbnail')->store('mods/thumbnails', 'public')
                : $thumbnail;

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;
        $data['type'] = $mod_type;
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

    public function edit(Mod $mod)
    {
        if ($mod->author !== request()->user()->name) {
            abort(403);
        }
        $categories = Category::where('mod_type', $mod['type'])->pluck('name');
        return view("mods.edit", ['categories' => $categories, 'mod' => $mod]);
    }

    public function update(Request $request, Mod $mod)
    {
        if ($mod->author !== request()->user()->name) {
            abort(403);
        }

        $categories = $this->get_categories($mod->type);
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'type' => ['string', 'required', 'in:vehicle,track,other'],
            'category' => ['required', 'string', Rule::in($categories)],
            'thumbnail' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:8192']
        ]);

        $thumbnail = $this->get_default_thumbnail($mod->type);
        if ($mod->thumbnail != $thumbnail) {
            $relativePath = str_replace('storage/', '', $mod->thumbnail);
            Storage::disk('public')->delete($relativePath);
        }
        $path = ($request->file('thumbnail')) 
                ? $path = 'storage/' . $request->file('thumbnail')->store('mods/thumbnails', 'public')
                : $thumbnail;

        $data['description'] = strip_tags($data['description'], 
        '<p><a><strong><em><ul><ol><li><img><b><u><i><h1><h2><h3><h4>');
        $data['thumbnail'] = $path;
        $mod->update($data);
        return redirect()->route('mod.show', $mod);
    }

    public function destroy(Mod $mod)
    {
        $mod_type = $mod['type'];
        if ($mod->author !== request()->user()->name) {
            abort(403);
        }
        $relativePath = str_replace('storage/', '', $mod->thumbnail);
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
        $mod->delete();

        return redirect()->route('mod.index', ['mod_type' => $mod_type]);
    }

    private function get_default_thumbnail(string $mod_type) {
        if ($mod_type === "vehicle") {
            return "images/car_thumbnail.jpg";
        } else if ($mod_type === "track") {
            return "images/track_thumbnail.jpg";
        } else {
            return "images/others_thumbnail.png";
        }
    }

    private function get_categories(string $mod_type) {
        $categories = Category::where('mod_type', $mod_type)->pluck('name');
        $categories->push("default");
        return $categories;
    }
}
