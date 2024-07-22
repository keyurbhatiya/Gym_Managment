@extends('layouts.app')
@section('title', 'Edit Staff Member')
@section('content')
<div class="container">
    <h1>Edit Staff Member</h1>
    {{-- @if(session('status'))
    <div class="alert alert-success mt-4">
        {{ session('status') }}
    </div>
    @endif --}}
    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $staff->firstname }}" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $staff->lastname }}" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ $staff->username }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="male" {{ $staff->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $staff->gender === 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $staff->gender === 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" id="designation" name="designation" class="form-control" value="{{ $staff->designation }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $staff->email }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" required>{{ $staff->address }}</textarea>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" class="form-control" value="{{ $staff->contact }}" required>
        </div>

        <button type="submit" class="btn btn-primary" onclick="return confirmUpdate()">Update</button>
    </form>
</div>
<script>
    function confirmUpdate() {
        return confirm('Sure you want to update this staff member?');
    }
</script>
@endsection
