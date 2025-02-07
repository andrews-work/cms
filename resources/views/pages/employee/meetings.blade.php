@extends('layouts.dashboard')

@section('title', 'Meetings')

@section('content')
    <!-- Make sure the outer container fills the screen height -->
    <div class="grid p-8 h-[88vh] bg-primary dark:bg-primary text-secondary dark:text-secondary place-content-center">
        <!-- Ensure this component takes available space -->
        <livewire:components.meetings.meetings />
    </div>
@endsection
