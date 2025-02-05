@extends('layouts.guest')

@section('title', 'Register')

@section('content')

    <div class="flex items-center justify-center min-h-screen bg-primary dark:bg-primary">
        <livewire:forms.register />
    </div>

@endsection
