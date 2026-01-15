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

    Route::livewire('/student/posts', 'pages::student.posts')
    ->name('student.posts');

    Route::livewire('/posts', 'pages::posts')
    ->name('posts');
});

require __DIR__.'/settings.php';
