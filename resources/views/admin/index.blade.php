{{-- @extends('admin.layout.sidebar');
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>


</x-app-layout> --}}
@extends('user.layout.sidebar')
@section('title', 'My Dashboard')

@section('header', 'User Dashboard')

@section('content')
    <section class="mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <div class="bg-pink-400 rounded-lg p-4 border border-gray-200 shadow-md flex items-center justify-center px-20 py-20">
            <div class="flex items-center justify-center w-12 h-12 bg-pink-200 rounded-full mr-2">
                <i class="bi bi-people text-3xl text-pink-600"></i>
            </div>
            <div>
                <p class="text-gray-800 text-lg font-semibold">Users</p>
                <p class="text-gray-600 text-sm">45</p>
            </div>
        </div>

        <div class="bg-red-400 rounded-lg p-4 border border-gray-200 shadow-md flex items-center justify-center px-20 py-20">
            <div class="flex items-center justify-center w-12 h-12 bg-red-200 rounded-full mr-2">
                <i class="bi bi-building text-3xl text-red-600"></i>
            </div>
            <div>
                <p class="text-gray-800 text-lg font-semibold">Properties</p>
                <p class="text-gray-600 text-sm">28</p>
            </div>
        </div>

        <div class="bg-green-400 rounded-lg p-4 border border-gray-200 shadow-md flex items-center justify-center px-20 py-20">
            <div class="flex items-center justify-center w-12 h-12 bg-green-200 rounded-full mr-2">
                <i class="bi bi-person-badge text-3xl text-green-600"></i>
            </div>
            <div>
                <p class="text-gray-800 text-lg font-semibold">Service Providers</p>
                <p class="text-gray-600 text-sm">12</p>
            </div>
        </div>

        {{-- <div class="bg-gray-100 rounded-lg p-4 border border-gray-200 shadow-md flex items-center justify-center">
            <div class="flex items-center justify-center w-12 h-12 bg-blue-200 rounded-full mr-2">
                <i class="bi bi-alarm text-3xl text-blue-600"></i>
            </div>
            <div>
                <p class="text-gray-800 text-lg font-semibold">Upcoming Services</p>
                <p class="text-gray-600 text-sm">5</p>
            </div>
        </div> --}}
    </div>
@endsection
