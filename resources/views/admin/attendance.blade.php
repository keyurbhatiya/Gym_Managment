@extends('layouts.app')

@section('title', 'Manage Attendance')

@section('content')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Attendance Table</h1>
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
                            <th>Contact Number</th>
                            <th>Chosen Service</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $key => $member)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $member->fullname }}</td>
                            <td>{{ $member->contact_number }}</td>
                            <td>{{ $member->service }}</td>
                            <td>
                                @php
                                $attendance = \App\Models\Attendance::where('curr_date', $current_date)
                                ->where('user_id', $member->id)
                                ->first();
                                @endphp

                                @if($attendance)
                                <div class='text-center'>
                                    <span class="label label-inverse">{{ $attendance->curr_date }}
                                        {{ $attendance->curr_time }}</span>
                                    <a href='{{ route("attendance.checkOut", $member->id) }}'>
                                        <button class='btn btn-danger'>Check Out <i class='fas fa-clock'></i></button>
                                    </a>
                                </div>
                                @else
                                <div class='text-center'>
                                    <a href='{{ route("attendance.checkIn", $member->id) }}'>
                                        <button class='btn btn-info'>Check In <i
                                                class='fas fa-map-marker-alt'></i></button>
                                    </a>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
