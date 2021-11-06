<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\LinkController::class, 'index'])->name('link.index');
Route::post('/create', [\App\Http\Controllers\LinkController::class, 'store'])->name('link.create');
Route::any('/{hash}', [\App\Http\Controllers\LinkController::class, 'show'])->name('link.show');
Route::get('/{hash}/info', [\App\Http\Controllers\LinkController::class, 'show_info'])->name('link.show.info');
