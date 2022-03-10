<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\ShowEditRecipeController;
use App\Http\Controllers\UpdateRecipeController;
use App\Http\Controllers\DeleteRecipeController;
use App\Http\Controllers\DashboardController;
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

// views
// Route::view('url', 'file-name')->name('url for route in laravel');

Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('register', 'register')->name('register')->middleware('guest');
Route::view('recipes/create', 'recipes.create')->name('recipes.create')->middleware('auth');
Route::patch('recipes/update', UpdateRecipeController::class)->name('recipes.update')->middleware('auth');
// get
Route::get('/', DashboardController::class)->name('dashboard');
Route::get('logout', LogoutController::class)->name('logout')->middleware('auth');
Route::get('user/profile', ProfileController::class)->name('user.profile')->middleware('auth');
Route::get('recipes/update', ShowEditRecipeController::class)->name('edit.recipe')->middleware('auth');

//post
Route::post('login', LoginController::class)->middleware('guest');
Route::post('register', RegisterController::class)->middleware('guest');
Route::post('recipes/create', CreateRecipeController::class)->middleware('auth');

// Route::patch('recipes{recipe}/like', LikeRecipeController::class);
Route::delete('delete/{id}', DeleteRecipeController::class)->name('recipes.delete')->middleware('auth');

