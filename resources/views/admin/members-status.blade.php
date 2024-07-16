<!-- resources/views/admin/members_status.blade.php -->
@extends('layouts.app')

@section('title', 'Member Status')
<style>
    .status-table th, .status-table td {
        text-align: center;
        vertical-align: middle;
    }
    .status-active {
        color: rgb(253, 196, 39);
    }
    .status-expired {
        color: rgb(255, 0, 0);
    }
</style>
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Member's Current Status</h2>
        <table class="table table-bordered  table-hover status-table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Fullname</th>
                    <th>Contact Number</th>
                    <th>Chosen Service</th>
                    <th>Plan</th>
                    <th>Membership Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member->fullname }}</td>
                        <td>{{ $member->contact_number }}</td>
                        <td>{{ ucfirst($member->service) }}</td>
                        <td>
                            @switch($member->plan)
                                @case('one_month')
                                    1 Month
                                    @break
                                @case('three_months')
                                    3 Months
                                    @break
                                @case('six_months')
                                    6 Months
                                    @break
                                @case('one_year')
                                    12 Months
                                    @break
                            @endswitch
                        </td>
                        <td>
                            @if($member->plan !== 'expired')
                                <span class="status-active">Active</span>
                            @else
                                <span class="status-expired">Expired</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
