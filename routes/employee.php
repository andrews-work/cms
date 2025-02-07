<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'employee')->group(function () {

    // dashboard
    Route::get('/employee/dashboard', function () {
        return view('pages.employee.dashboard');
    })->name('employee.dashboard');

    // messages
    Route::get('/employee/messages', function () {
        return view('pages.employee.messages');
    })->name('employee.messages');

    // tasks
    Route::get('/employee/tasks', function () {
        return view('pages.employee.tasks');
    })->name('employee.tasks');

    // calendar
    Route::get('/employee/calendar', function () {
        return view('pages.employee.calendar');
    })->name('employee.calendar');

    // meetings
    Route::get('/employee/meetings', function () {
        return view('pages.employee.meetings');
    })->name('employee.meetings');

});

