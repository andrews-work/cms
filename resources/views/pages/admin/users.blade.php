@extends('layouts.dashboard')

@section('title', 'users')

@section('content')
    <div class="w-full p-8 min-h-[88vh] bg-primary dark:bg-primary text-secondary dark:text-secondary flex flex-col justify-evenly">

        <h1 class="w-full mb-4 text-4xl font-bold text-center">Manage Users</h1>

        <div class="w-2/3 mx-auto">
            <livewire:auth.admin.user-list />
        </div>

    </div>
@endsection
