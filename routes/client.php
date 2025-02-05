<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'client')->group(function () {

    // dashboard
    Route::get('/client/dashboard', function () {
        return view('pages.client.dashboard');
    })->name('client.dashboard');

    // messages
    Route::get('/client/messages', function () {
        return view('pages.client.messages');
    })->name('client.messages');

    // tasks
    Route::get('/client/tasks', function () {
        return view('pages.client.tasks');
    })->name('client.tasks');

    // meetings
    Route::get('/client/meetings', function () {
        return view('pages.client.meetings');
    })->name('client.meetings');

    // details
    Route::get('/client/details', function () {
        return view('pages.client.details');
    })->name('client.details');
});

