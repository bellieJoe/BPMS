<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ButterflyController;
use App\Http\Controllers\ApplicationController;

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

Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/dashboard', function () {
    return view('main.dashboard');
})->name('dashboard');
Route::get('/', function () {
    return redirect(route('home'));
});
Route::get('/test', function () {
    return json_encode(auth()->user());
})->name('test');

Route::view('login', 'auth.signin')->name('login')->middleware('guest');

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function(){
    Route::view('signin', 'auth.signin')->name('signin')->middleware('guest');
    Route::view('login', 'auth.signin')->name('login')->middleware('guest');
    Route::view('signup', 'auth.signup')->name('signup')->middleware('guest');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::post('authenticate', [UserController::class, 'authenticate'])->name('authenticate');
});

Route::group(['prefix' => 'butterflies', 'as' => 'butterflies.', 'middleware' => ['auth']], function(){
    Route::get('', [ButterflyController::class , 'index'])->name('index');
    Route::get('create', [ButterflyController::class , 'create'])->name('create');
    Route::post('store', [ButterflyController::class , 'store'])->name('store');
    Route::delete('delete/{id}', [ButterflyController::class , 'destroy'])->name('destroy');
    Route::get('view-image/{url}', [ButterflyController::class , 'viewImage'])->name('viewImage');
});
Route::group(['prefix' => 'permits', 'as' => 'permits.', 'middleware' => ['auth']], function(){
    Route::get('', [ApplicationController::class , 'index'])->name('index');
    Route::get('create', [ApplicationController::class , 'create'])->name('create');
    Route::post('store', [ApplicationController::class , 'store'])->name('store');
});
