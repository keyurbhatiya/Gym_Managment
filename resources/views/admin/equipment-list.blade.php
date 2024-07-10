@extends('layouts.app')

@section('title', 'Registered Members List')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h1 class="m-0">All Equipment List</h1>
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
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Equipment</th>
                <th>Description</th>
                <th>Date of Purchase</th>
                <th>Quantity</th>
                <th>Vendor</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Cost Per Item</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipment as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->equipment }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->dop }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->vendor }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->contact_number }}</td>
                    <td>{{ $item->cost_per_item }}</td>
                    <td>
                        {{-- <a href="{{ route('equipment.edit', $item->id) }}" class="btn btn-primary">Edit</a> --}}
                        <form action="{{ route('equipment.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this equipment?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
