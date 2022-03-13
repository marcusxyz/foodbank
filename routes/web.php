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
use App\Models\Recipe;
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

// Route::view('url', 'file-name')->name('url for route in laravel');

// Index
Route::get('/', DashboardController::class)->name('dashboard');

// Register
Route::view('register', 'register')->name('register')->middleware('guest');
Route::post('register', RegisterController::class)->middleware('guest');

// Login/Logout
Route::view('login', 'login')->name('login')->middleware('guest');
Route::post('login', LoginController::class)->middleware('guest');
Route::get('logout', LogoutController::class)->name('logout')->middleware('auth');

// Profile
Route::get('user/profile', ProfileController::class)->name('user.profile')->middleware('auth');

// Recipes
Route::view('recipes/create', 'recipes.create')->name('recipes.create')->middleware('auth');
Route::post('recipes/upload', CreateRecipeController::class)->name('recipes.upload')->middleware('auth');
Route::delete('delete/{id}', DeleteRecipeController::class)->name('recipes.delete')->middleware('auth');
Route::get('view/recipe:{recipes}', function (Recipe $recipes) {
    return view('/recipes/view', [
        'recipes' => $recipes
    ]);
});

Route::get('user/update/recipe:{recipes}', function (Recipe $recipes) {
    return view('/recipes/update', [
        'recipes' => $recipes
    ]);
});

Route::post('recipes.patch/{recipes}', [
    'as' => 'recipes.patch',
    'uses' => UpdateRecipeController::class
]);
