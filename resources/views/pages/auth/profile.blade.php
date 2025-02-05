@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')
    <div class="p-8 min-h-[83vh] bg-primary dark:bg-primary text-secondary dark:text-secondary">

        <!-- Center the h1 -->
        <h1 class="mb-4 mt-[15vh] text-4xl font-bold text-center">Update Profile</h1>

        <div class="mt-[10vh]">
            <livewire:forms.profile />
        </div>
    </div>
@endsection
