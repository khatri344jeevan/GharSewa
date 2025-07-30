@extends('service_provider.layouts.master')

@section('title', 'Service_Provider Dashboard')

@section('content')

    <div class="flex items-center justify-between space-x-4 ">


        <a href="{{ route('service_provider.tasks.create') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded shadow-md mt-20">
            Add Task
        </a>
    </div>

    <div class="mt-6 bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gray-300 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left text-center">Id</th>
                    <th class="px-6 py-3 text-left text-center">Package Name</th>
                    <th class="px-6 py-3 text-left text-center">Property Title</th>
                    <th class="px-6 py-3 text-left text-center">Owner Name</th>
                    <th class="px-6 py-3 text-left text-center">Total Days</th>
                    <th class="px-6 py-3 text-left text-center">Status</th>
                    <th class="px-6 py-3 text-left text-center">Number of visits</th>
                    <th class="px-6 py-3 text-left text-center">Action</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($tasks as $task)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-center">{{ $task->booking->package->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center">{{ $task->booking->property->title ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center">{{ $task->booking->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center">{{ $task->booking->package->duration_days ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center">{{ ucfirst($task->status) }}</td>
                        <td class="px-6 py-4 text-center">{{ $task->booking->package->service_limit ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="border bg-gray-600 rounded px-5 py-2 text-white hover:bg-gray-700">
                                <a href="{{ route('service_provider.tasks.edit', $task->id) }}">
                                    <button class="text-center px-2">EDIT</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
