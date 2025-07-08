<script src="https://cdn.tailwindcss.com"></script>
@extends('user.layout.sidebar')

{{-- @section('title', 'User Dashboard') --}}

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow rounded p-6">
            <p class="text-gray-700">
                You have <strong>{{ $propertyCount }}</strong> registered
                property{{ $propertyCount == 1 ? '' : 'ies' }}.
            </p>
        </div>
    </div>
@endsection
