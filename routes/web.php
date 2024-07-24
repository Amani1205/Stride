<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pages.index');
})->name('index');

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






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',


    ])->group(function () {
        Route::get('/dashboard', function () {
            return redirect()->route('index');
        })->name('dashboard');
    });

