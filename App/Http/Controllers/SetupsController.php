<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetupsController extends Controller
{

    public function index() {

        $setups = Setup::all();
        return view('setups.setups', ['setups' => $setups]);
    }

    public function get_setups_table_content(Request $request) {
        $search_input = $request->input('search_input');

        $setups = empty($search_input)
            ? Setup::all()
            : Setup::where('name', 'LIKE', "%{$search_input}%")
            ->orWhere([
                ['author', 'LIKE', "%{$search_input}%"],
                ['vehicle', 'LIKE', "%{$search_input}%"],
                ['track', 'LIKE', "%{$search_input}%"]
            ])->get();

        $setups_table_content = view('setups.partials.setups-table-content', 
                         ['setups' => $setups])->render();

        return response()->json([
            'setups_table_content' => $setups_table_content
        ]);
    }

    public function store(Request $request) {
        if (!Auth::check()) {
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'vehicle' => ['required', 'string'],
            'track' => ['required', 'string']
        ]);

        $data['author'] = request()->user()->name;
        $data['likes'] = 0;
        $data['downloads'] = 0;

        Setup::create($data);
        return response()->json([
            'message' => 'Setup created successfully!',
        ]);
    }

    public function edit(string $setup_name)
    {
        $setup = Setup::where([
            ['name', '=', $setup_name],
            ['author', '=', request()->user()->name]
        ])->first();

        return view('setups.partials.setup-edit-form', compact('setup'));
    }
    

    public function update(Request $request, string $setup_name) {
        $setup = Setup::where([
            ['name', '=', $setup_name],
            ['author', '=', $request->user()->name]
        ])->first();

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'vehicle' => ['required', 'string'],
            'track' => ['required', 'string']
        ]);
        $setup->name = $request->input('name');
        $setup->vehicle = $request->input('vehicle');
        $setup->track = $request->input('track');

        $setup->save();
    }

    public function destroy(Request $request, string $setup_name) {
        $setup = Setup::where([
            ['name', '=', $setup_name],
            ['author', '=', $request->user()->name]
        ])->first();

        $setup->delete();
    }

}