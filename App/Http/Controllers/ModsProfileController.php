<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModsProfileController extends Controller
{

    public function get_mods_profile(string $username, string $type) {

        //$mods = Mod::where([['type', '=', $type], ['author', '=', $user]])->get();
        $mods = Mod::where('type', $type)->where('author', $username)->get();
        return response()->json($mods);
    }

}