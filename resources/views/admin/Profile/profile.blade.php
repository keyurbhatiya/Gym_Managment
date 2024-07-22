@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Profile</h1>
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="#" alt="Keyur">
                            </div>
                            <h5 class="user-name">{{ $admin->firstname }} {{ $admin->lastname }}</h5>
                            <h6 class="user-email">{{ $admin->email }}</h6>

                        </div>
                        <div class="about">
                            <h5 class="mb-2 text-primary">About</h5>
                            <p>I'm {{ $admin->firstname }}. Full Stack Designer. I enjoy creating user-centric, delightful and human experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Enter first name" value="{{ $admin->firstname }}">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Enter last name" value="{{ $admin->lastname }}">
                            </div>
                        </div>
                        {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                        </div> --}}
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="createddate">Created Date</label>
                                <input type="text" class="form-control" id="createddate" placeholder="Created date" value="{{ $admin->created_at }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">

                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                                <button type="button" id="update" name="update" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.change-password') }}" class="btn btn-primary">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
