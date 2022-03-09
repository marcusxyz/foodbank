<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\ShowEditRecipeController;
use App\Http\Controllers\UpdateRecipeController;
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
Route::view('/', 'dashboard')->name('dashboard');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('register', 'register')->name('register')->middleware('guest');
Route::view('create-recipe', 'create-recipe')->name('create-recipe')->middleware('auth');
// Route::view('profile', 'profile')->name('profile')->middleware('auth');
Route::get('edit-recipe', ShowEditRecipeController::class)->name('edit.recipe')->middleware('auth');
Route::patch('edit-recipe', UpdateRecipeController::class)->name('update.recipe')->middleware('auth');
// get
Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::get('logout', LogoutController::class)->middleware('auth');
Route::get('profile', ProfileController::class);

//post
Route::post('login', LoginController::class)->middleware('guest');
Route::post('register', RegisterController::class)->middleware('guest');
Route::post('create-recipe', CreateRecipeController::class)->middleware('auth');

// Route::patch('recipes{recipe}/like', LikeRecipeController::class);
// Route::post('recipes{recipe}/delete', DeleteRecipeController::class)->middleware('auth'); // Maybe use Route::destroy
// Route::post('recipes{recipe}/update', UpdateRecipeController::class)->middleware('auth');
