<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/create', [App\Http\Controllers\CharacterController::class, 'create'])->name('create');

Route::get('/overview', [App\Http\Controllers\CharacterController::class, 'index'])->name('overview');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/createbase', [App\Http\Controllers\CharacterController::class, 'store'])->name('createbase');

Route::get('/logout', [App\Http\Controllers\PageController::class, 'Logout'])->name('logout');
