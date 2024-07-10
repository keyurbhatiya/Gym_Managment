@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Member</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Member</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3">
    <form action="{{ route('members.update', $member->id) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">Personal Info</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $member->fullname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $member->username }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Leave blank to keep existing or enter a new one</small>
                            @if ($errors->has('password'))
                            <div class="alert alert-danger mt-3">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dor">D.O.R:</label>
                            <input type="date" class="form-control" id="dor" name="dor" value="{{ $member->dor }}" required>
                            <small class="form-text text-muted">Date of registration</small>
                        </div>
                        <div class="form-group">
                            <label for="plan">Plans:</label>
                            <select class="form-control" id="plan" name="plan" required>
                                <option value="one_month" {{ $member->plan == 'one_month' ? 'selected' : '' }}>One Month</option>
                                <option value="three_months" {{ $member->plan == 'three_months' ? 'selected' : '' }}>Three Months</option>
                                <option value="six_months" {{ $member->plan == 'six_months' ? 'selected' : '' }}>Six Months</option>
                                <option value="one_year" {{ $member->plan == 'one_year' ? 'selected' : '' }}>One Year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">Contact Details</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="contact_number">Contact Number:</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $member->contact_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $member->address }}" required>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">Service Details</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Services:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="service" id="fitness" value="fitness" {{ $member->service == 'fitness' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="fitness">Fitness - $55 per month</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="service" id="sauna" value="sauna" {{ $member->service == 'sauna' ? 'checked' : '' }}>
                                <label class="form-check-label" for="sauna">Sauna - $35 per month</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="service" id="cardio" value="cardio" {{ $member->service == 'cardio' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cardio">Cardio - $40 per month</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount:</label>
                            <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{ $member->total_amount }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update Member Details</button>
                    </div>
                </div>
            </div>
        </div>


    </form>

    @if (session('success'))
        <!-- Modal -->
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

<script>
    $(document).ready(function(){
        @if (session('success'))
            $('#successModal').modal('show');
        @endif
    });
</script>
@endsection
