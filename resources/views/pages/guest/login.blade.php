@extends('layouts.guest')

@section('title', 'Login')

@section('content')

    <div class="flex items-center justify-center min-h-screen bg-primary dark:bg-primary">
        <livewire:forms.login />
    </div>

@endsection
