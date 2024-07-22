@extends('layouts.app')

@section('title', 'Registered Members List')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h1 class="m-0">All Members List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>D.O.R</th>
                <th>Address</th>
                <th>Amount</th>
                <th>Chosen Service</th>
                <th>Plan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $member->fullname }}</td>
                    <td>{{ $member->username }}</td>
                    <td>{{ ucfirst($member->gender) }}</td>
                    <td>{{ $member->contact_number }}</td>
                    <td>{{ $member->dor }}</td>
                    <td>{{ $member->address }}</td>
                    <td>${{ $member->total_amount }}</td>
                    <td>{{ ucfirst($member->service) }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $member->plan)) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No registered members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
