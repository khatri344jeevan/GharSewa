@extends('admin.layout.master')

@section('title', 'Admin Dashboard')

@section('content')
    <h3>Admin Dashboard</h3>
    <p>Welcome, {{ auth()->user()->name }}!</p>
@endsection
