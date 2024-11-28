<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TracksController extends Controller
{
   
    public function tracks(): View
    {
        return view("tracks.tracks");
    }
}