<?php

use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::view('/', 'login')->name('login');
Route::view('register', 'register')->name('register');
// Route::get('register', RegisterController::class, 'create')->middleware('guest');
// Route::post('register', RegisterController::class, 'store')->middleware('guest');
Route::post('register', RegisterController::class)->middleware('guest');
Route::post('login', LoginController::class)->middleware('guest');
Route::get('logout', LogoutController::class)->middleware('auth');
Route::post('recipes', CreateRecipeController::class)->middleware('auth');
// Route::patch('recipes{recipe}/like', LikeRecipeController::class);
// Route::post('recipes{recipe}/delete', DeleteRecipeController::class)->middleware('auth'); // Maybe use Route::destroy
// Route::post('recipes{recipe}/update', UpdateRecipeController::class)->middleware('auth');
