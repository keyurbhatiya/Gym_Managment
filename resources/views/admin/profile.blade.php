<!-- resources/views/admin/profile.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Profile</h1>
    <p><strong>Name:</strong> {{ $admin->firstname }} {{ $admin->lastname }}</p>
    <p><strong>Email:</strong> {{ $admin->email }}</p>
    <a href="{{ route('admin.change-password') }}" class="btn btn-primary">Change Password</a>
</div>
@endsection
