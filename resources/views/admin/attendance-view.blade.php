{{-- resources/views/admin/attendance/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Attendance List</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <div class="container-fluid">
        <div class="row-fluid">
            <div class='widget-content nopadding'>
                <table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Plan</th>
                            <th>Attendance Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $index => $member)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $member->fullname }}</td>
                                <td>{{ $member->plan }}</td>
                                <td>{{ $member->attendance_count }} Days</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            @endsection
