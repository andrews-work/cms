@extends('layouts.dashboard')

@section('title', 'Calendar')

@section('content')
    <div class="grid min-h-screen p-8 bg-primary text-secondary place-content-center">
        <div class="w-[70vw] h-[calc(100vh-32px)] overflow-y-auto">
            <livewire:components.calendar.show />
        </div>
    </div>
@endsection
