@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">GYM's Staff List</h1>

    @if(session('status'))
    <div class="alert alert-success mt-4">
        {{ session('status') }}
    </div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Staff Table</h3>
            <a href="{{ route('staff.entry.form') }}" class="btn btn-primary float-right">Add Staff Members</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $staff->firstname }} {{ $staff->lastname }}</td>
                        <td>{{ '@' . $staff->username }}</td>
                        <td>{{ $staff->gender }}</td>
                        <td>{{ $staff->designation }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->address }}</td>
                        <td>{{ $staff->contact }}</td>
                        <td>
                            <a href="{{ route('staff.edit', $staff->id) }}"
                                class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to remove this staff member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
