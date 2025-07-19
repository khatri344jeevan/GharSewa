{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}
{{-- @extends('user.layout.master')

@section('title', 'Edit Profile')

@section('content')
<div class="text-center mt-12 text-3xl font-semibold text-gray-800">
    Manage your Profile
</div>

    <div class="py-12 flex-row justify-center items-center min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
 --}}

 @extends('user.layout.master')

@section('title', 'Edit Profile')

@section('content')

    <!-- Page Heading -->
    <div class="text-center mt-12 text-3xl font-semibold text-gray-800">
        Manage your Profile
    </div>

    <div class="py-12 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Flex container for Profile & Password -->
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Update Profile Info -->
                <div class="w-full lg:w-1/2 bg-white shadow-md rounded-xl p-6">
                    {{-- <h3 class="text-xl font-semibold text-gray-700 mb-4">Profile Information</h3> --}}
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="w-full lg:w-1/2 bg-white shadow-md rounded-xl p-6">
                    {{-- <h3 class="text-xl font-semibold text-gray-700 mb-4">Update Password</h3> --}}
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

            </div>

            <!-- Delete Account Section -->
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-xl font-semibold text-red-600 mb-4">Delete Account</h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection

