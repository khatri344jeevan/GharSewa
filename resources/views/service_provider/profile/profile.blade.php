{{-- This line tells Laravel to use our layout file as the template. --}}
@extends('service_provider.layouts.layout')

{{-- This sets the browser tab title for this page. --}}
@section('title', 'My Profile')

{{-- This is the simple content that will be injected into the layout. --}}
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">
            Profile Page
        </h1>
        <hr class="my-4">
        <p class="text-gray-600">
            This is the starting point for the profile page. It is loading correctly.
        </p>
    </div>
@endsection