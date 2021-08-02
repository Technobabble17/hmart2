<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ItemImagesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageCommentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('browse/search', [BrowseController::class, 'search'])->name('browse.search');
Route::resource('browse', BrowseController::class)->only(['index', 'show']);
Route::resource('messages', MessageController::class);
Route::resource('messages.comments', MessageCommentController::class);
Route::view('test', 'test.index');

Route::middleware('auth')->group(function()
{
    Route::resource('items', ItemController::class);
    Route::get('search', 'App\Http\Controllers\ItemController@search')->name('items.search');
    Route::resource('user', UserController::class);
    Route::resource('images', ImageController::class);
    Route::resource('items.images', ItemImagesController::class);
});
