<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::group(['middleware' => ['auth', ]], function () {
    Route::view('dashboard', 'dashboard')
    ->name('dashboard');

    Route::livewire('/student/create', 'pages::student.create')
    ->name('student.create');
});

require __DIR__.'/settings.php';
