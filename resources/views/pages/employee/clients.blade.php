@extends('layouts.dashboard')

@section('title', 'Client List')

@section('content')
    <div class="grid p-8 h-[88vh] bg-primary dark:bg-primary text-secondary dark:text-secondary place-content-center">
        <livewire:auth.employee.clients />
    </div>
@endsection
