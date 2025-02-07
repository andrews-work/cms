<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'admin')->group(function () {

    // dashboard
    Route::get('/admin/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('admin.dashboard');

    // messages
    Route::get('/admin/messages', function () {
        return view('pages.admin.messages');
    })->name('admin.messages');

    // tasks
    Route::get('/admin/tasks', function () {
        return view('pages.admin.tasks');
    })->name('admin.tasks');

    // calendar
    Route::get('/admin/calendar', function () {
        return view('pages.admin.calendar');
    })->name('admin.calendar');

    // meetings
    Route::get('/admin/meetings', function () {
        return view('pages.admin.meetings');
    })->name('admin.meetings');

    // users
    Route::get('/admin/users', function () {
        return view('pages.admin.users');
    })->name('admin.users');
});

