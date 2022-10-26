<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Games;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//home page
Route::get('/', function() {
    return view('Home');
});

//going to a specific page
Route::get('/{page}', function($page) {
    return view('games', [
        'heading' => 'New and Trending Games',
        'games' => Games::getPage($page)
    ]);
});


//going into game page
Route::get('/game/{slug}', function($slug) {

    $GameRow = Games::where('slug', '=', $slug)->get();
    return view('game', [
        'game' => Games::find($slug, $GameRow[0]['pageNum'])
    ]);
});
