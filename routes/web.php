<?php

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

use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);
Route::post('/', [IndexController::class, 'upload'])->name('upload');
Route::get('/show', [IndexController::class, 'show']);
Route::get('/cleaning', [IndexController::class, 'cleaning'])->name('cleaning');
Route::get('/binning', [IndexController::class, 'binning'])->name('binning');
Route::get('/proses', [IndexController::class, 'proses'])->name('proses');
Route::get('/download', [IndexController::class, 'download'])->name('download');
