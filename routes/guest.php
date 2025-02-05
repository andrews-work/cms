<?php

use Illuminate\Support\Facades\Route;

// auth routes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/employee.php';
require __DIR__ . '/client.php';

// pages

Route::get('/', function () {
    return view('pages.guest.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.guest.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.guest.contact');
})->name('contact');


// auth related

Route::get('/register', function () {
    return view('pages.guest.register');
})->name('register');

Route::get('/login', function () {
    return view('pages.guest.login');
})->name('login');

Route::get('/forgot', function () {
    return view('pages.guest.forgot');
})->name('forgot');
