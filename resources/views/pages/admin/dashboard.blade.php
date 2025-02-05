@extends('layouts.dashboard')

<!-- create a dashboard layout for admin/client/employee - sidebar and main livewire components? should be easy enough hehe -->

@section('title', 'Dashboard')

@section('content')
    <div class="grid min-h-screen p-8 bg-primary dark:bg-primary text-secondary dark:text-secondary place-content-center">
        <h1 class="mb-4 text-4xl font-bold">Welcome to the admin dashboard!</h1>
        <p class="text-lg">This is the main content for the admin dashboard.</p>
    </div>
@endsection
