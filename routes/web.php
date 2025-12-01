<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/landing', function () {
    return view('landingpage');
})->name('landing');

Route::get('/details', function () {
    return view('details');
})->name('details');

Route::get('/story', function () {
    return view('story');
})->name('story');

Route::get('/gallery', [UploadController::class, 'index'])->name('gallery');
Route::post('/gallery/upload', [UploadController::class, 'store'])->name('gallery.upload');
