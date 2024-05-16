<?php

use App\Http\Controllers\PhotosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('form_send');
});

Route::post('/send', [PhotosController::class, 'send'])->name('send-photo');
Route::get('/home', [PhotosController::class, 'index'])->name('home');
Route::get('/download/{file}', [PhotosController::class, 'download'])->name('download');
Route::get('/home/preview', [PhotosController::class, 'preview'])->name('preview');
Route::get('/form', [PhotosController::class, 'form'])->name('form');
