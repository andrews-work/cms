<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', function () {
        return view('pages.auth.profile');
    })->name('profile');

    Route::get('/logout', function () {
        return view('pages.guest.home');
    })->name('logout');

});
