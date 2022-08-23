<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeCon;
use App\Http\Controllers\EstablishmentController as ECon;
use App\Http\Controllers\MenuController as MenuCon;
use App\Http\Controllers\MealController as MealCon;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//establishments
Route::prefix('establishments')->name('establishments-')->group(function () {
    Route::get('', [ECon::class, 'index'])->name('index')->middleware('role:user');
    Route::get('create', [ECon::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('', [ECon::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{establishment}', [ECon::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('{establishment}', [ECon::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('{establishment}', [ECon::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::get('show/{id}', [ECon::class, 'show'])->name('show')->middleware('role:user');
    Route::get('show', [ECon::class, 'link'])->name('show-route');
});

//menus
Route::prefix('menus')->name('menus-')->group(function () {
    Route::get('', [MenuCon::class, 'index'])->name('index')->middleware('role:user');
    Route::get('create', [MenuCon::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('', [MenuCon::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{menu}', [MenuCon::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('{menu}', [MenuCon::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('{menu}', [MenuCon::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::get('show/{id}', [MenuCon::class, 'show'])->name('show')->middleware('role:user');
    Route::get('show', [MenuCon::class, 'link'])->name('show-route');
});

//meals
Route::prefix('meals')->name('meals-')->group(function () {
    Route::get('', [MealCon::class, 'index'])->name('index')->middleware('role:user');
    Route::get('create', [MealCon::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('', [MealCon::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{meal}', [MealCon::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('{meal}', [MealCon::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('{meal}', [MealCon::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::get('show/{id}', [MealCon::class, 'show'])->name('show')->middleware('role:user');
    Route::get('show', [MealCon::class, 'link'])->name('show-route');
});