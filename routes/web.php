<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\SitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TripController::class, 'show'])->name('home');

Route::get('/trips', [TripController::class, 'show'])->name('trips');

Route::get('/trip', [TripController::class, 'form'])->name('trip.add');
Route::post('/trip', [TripController::class, 'store'])->name('trip.store');

Route::get('/sits/{trip}', [SitController::class, 'showSit'])->name('sits');

Route::get('/sits/{sit}/{trip}/update', [SitController::class, 'updateSit'])->name('sits.update');
Route::post('/sits/{sit}/update', [SitController::class, 'updateSitStore'])->name('sits.updateStore');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'registerStore'])->name('register.store');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'loginValidate'])->name('login.validate');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('profile', [UserController::class, 'profile'])->name('profile');

Route::get('calender', [UserController::class, 'showCalendar'])->name('calender');






