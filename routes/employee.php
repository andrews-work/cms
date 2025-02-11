<?php

use App\Livewire\Forms\Meetings\Edit;
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

    // meetings - show
    Route::get('/employee/meetings', function () {
        return view('pages.employee.meetings');
    })->name('employee.meetings');

        // edit
        // Route::get('/employee/meetings/edit', function () {
        //     return view('pages.employee.meetings.edit');
        // })

    // clients
    Route::get('/employee/clients', function () {
        return view('pages.employee.clients');
    })->name('employee.clients');

    // client profile
    Route::get('/employee/client/{id}', function ($id) {
        return view('pages.employee.client-profile', ['id' => $id]);
    })->name('employee.client-profile');
});

