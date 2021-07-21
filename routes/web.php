<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ItemImagesController;
use App\Http\Controllers\ImageController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/browse', BrowseController::class)->only(['index', 'show']);
Route::middleware('auth')->group(function()
{
    Route::resource('user', UserController::class);
    Route::resource('items', ItemController::class);
    Route::resource('images', ImageController::class);
    Route::resource('items.images', ItemImagesController::class);
});
