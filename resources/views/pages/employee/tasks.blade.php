@extends('layouts.dashboard')

@section('title', 'Tasks')

@section('content')
    <div class="grid p-8 h-[88vh] bg-primary dark:bg-primary text-secondary dark:text-secondary place-content-center">
        <livewire:components.tasks.tasks />
    </div>
@endsection
