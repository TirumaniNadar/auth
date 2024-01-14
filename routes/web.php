<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


Route::get('/register', 'App\Http\Controllers\UserController@register')->name('register');
Route::post('/register/submit', 'App\Http\Controllers\UserController@registerSubmit')->name('register.submit');

Route::get('/get-city-list', 'App\Http\Controllers\UserController@getCityList')->name('getCity');

Route::get('/login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('/login/submit', 'App\Http\Controllers\UserController@loginSubmit')->name('login.submit');


Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/', 'App\Http\Controllers\UserController@dashboard')->name('dashboard');
    Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('profile');

    Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');

});
