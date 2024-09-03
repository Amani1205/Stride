<?php

use App\Http\Controllers\SportsController;

// use App\Http\Controllers\GroundController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/sports', function () {
    return view('pages.sports');
})->name('sports');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/selection', function () {
    return view('selection');
})->name('selection');

Route::get('/athlete-register', function () {
    return view('auth/athlete-register');
})->name('athlete-register');

Route::get('/coach-register', function () {
    return view('auth/coach-register');
})->name('coach-register');

Route::get('/stadium-register', function () {
    return view('auth/stadium-register');
})->name('stadium-register');





// Cricket/
Route::get('/cricket', [SportsController::class, 'cricket'])->name('cricket');

// Athletics
Route::get('/athletics', [SportsController::class, 'athletics'])->name('athletics');

// Chess
Route::get('/chess', [SportsController::class, 'chess'])->name('chess');

// Karate
Route::get('/karate', [SportsController::class, 'karate'])->name('karate');

// Football
Route::get('/football', [SportsController::class, 'football'])->name('football');

// Basketball
Route::get('/basketball', [SportsController::class, 'basketball'])->name('basketball');

// Tennis
Route::get('/tennis', [SportsController::class, 'tennis'])->name('tennis');

// Swimming
Route::get('/swimming', [SportsController::class, 'swimming'])->name('swimming');

// Rugby
Route::get('/rugby', [SportsController::class, 'rugby'])->name('rugby');

// Boxing
Route::get('/boxing', [SportsController::class, 'boxing'])->name('boxing');

// Hockey
Route::get('/hockey', [SportsController::class, 'hockey'])->name('hockey');

// Volleyball
Route::get('/volleyball', [SportsController::class, 'volleyball'])->name('volleyball');

// Badminton
Route::get('/badminton', [SportsController::class, 'badminton'])->name('badminton');

// Baseball
Route::get('/baseball', [SportsController::class, 'baseball'])->name('baseball');

// Table Tennis
Route::get('/tabletennis', [SportsController::class, 'tabletennis'])->name('tabletennis');




Route::get('/coach/{id}', [SportsController::class, 'showCoach'])->name('coach.show');
Route::get('/ground/{id}', [SportsController::class, 'showGround'])->name('ground.show');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',


    ])->group(function () {
        Route::get('/dashboard', function () {
            return redirect()->route('index');
        })->name('dashboard');
    });

