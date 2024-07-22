@extends('layouts.app')

@section('title', 'Equipment Entry Form')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Equipment Entry Form</h1>
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

<div class="container mb-3">
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        Equipment Info
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="equipment">Equipment :</label>
                            <select class="form-control" id="equipment" name="equipment" required>
                                <option value="" disabled selected>Select Equipment</option>
                                <option value="treadmill">Treadmill</option>
                                <option value="elliptical">Elliptical</option>
                                <option value="dumbbell">Dumbbell</option>
                                <option value="stationary_bike">Stationary Bike</option>
                                <option value="rowing_machine">Rowing Machine</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Short Description" required>
                        </div>
                        <div class="form-group">
                            <label for="dop">Date of Purchase :</label>
                            <input type="date" class="form-control" id="dop" name="dop" required>
                            <small class="form-text text-muted">Please mention the date of purchase</small>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity :</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Equipment Qty" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        Other Details
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="vendor">Vendor :</label>
                            <input type="text" class="form-control" id="vendor" name="vendor" placeholder="Vendor" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Vendor Address" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number :</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="(999) 999-9999" required>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Pricing
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cost_per_item">Cost Per Item:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control" id="cost_per_item" name="cost_per_item" placeholder="269" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit Details</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        @if (session('success'))
            $('#successModal').modal('show');
        @endif
    });
</script>
@endsection
