@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-slate-800 leading-tight">
        Profile {{ ucfirst(auth()->user()->role) }} - {{ auth()->user()->name }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        {{-- Profile Information Form (Only for teacher and officer) --}}
        @if(auth()->user()->role === 'teacher' || auth()->user()->role === 'officer')
        <div class="p-4 sm:p-8 bg-white shadow-sm border border-slate-200 sm:rounded-2xl">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        @endif

        {{-- Update Password Form (For everyone) --}}
        <div class="p-4 sm:p-8 bg-white shadow-sm border border-slate-200 sm:rounded-2xl">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Delete User Form (Only for teacher and officer) --}}
        @if(auth()->user()->role === 'teacher' || auth()->user()->role === 'officer')
        <div class="p-4 sm:p-8 bg-white shadow-sm border border-slate-200 sm:rounded-2xl">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
