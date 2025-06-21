<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Screen;
use App\Models\Playlist;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/playlist/{code}', function ($code) {
    $screen = Screen::where('code', $code)->firstOrFail();

    $mediaItems = $screen->media->map(function ($media) {
        return [
            'type' => $media->type,
            'url' => asset('storage/' . $media->file_path),
            'duration' => $media->duration,
        ];
    });

    return response()->json($mediaItems);
});


