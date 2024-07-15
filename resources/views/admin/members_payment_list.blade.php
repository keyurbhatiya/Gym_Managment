<!-- resources/views/admin/members_payment_list.blade.php -->
@extends('layouts.app')

@section('title', 'Member Payment List')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Registered Member's Payment</h2>
    <table class="table table-bordered status-table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Member</th>
                <th>Register Date</th>
                <th>Chosen Service</th>
                <th>Plan</th>
                <th>Amount</th>
                <th>Action</th>
                <th>Remind</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->fullname }}</td>
                    <td>{{ $member->created_at }}</td>
                    <td>{{ $member->service }}</td>
                    <td>{{ $member->plan }}</td>
                    <td>₹{{ $member->total_amount }}</td>
                    <td>
                        <a href="{{ route('members.showPaymentForm', $member->id) }}" class="btn btn-success">Make Payment</a>
                    </td>
                    <td><button class="btn btn-danger">Alert</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
