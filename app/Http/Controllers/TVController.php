<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use Illuminate\Http\Request;

class TVController extends Controller
{
    public function show($code)
    {
        $screen = Screen::where('code', $code)->firstOrFail();

        // Load the related screen_controls with media
        $screenControls = $screen->screenControls()->with('media')->get();

        return view('tv.show', compact('screen', 'screenControls'));
    }
}
