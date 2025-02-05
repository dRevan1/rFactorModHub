<?php

namespace App\Http\Controllers;

use App\Models\Mod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModsProfileController extends Controller
{

    public function get_mods_profile(Request $request, string $username, string $type) {

        $isAuthor = Auth::check() && $request->user()->name === $username;
        $mods = Mod::where([['type', '=', $type], ['author', '=', $username]])->get();
        $mods_list = view('profile.partials.mods-list', 
                         ['mods' => $mods, 'mod_type' => $type, 'isAuthor' => $isAuthor])->render();

        return response()->json([
            'mods_list' => $mods_list
        ]);
    }

}