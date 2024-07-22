@extends('layouts.app')
@section('title', 'Report')
@section('head')
<!-- Include any additional CSS or JS files here -->
@endsection

@section('content')

<div class="container">

    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="m-0">Reports</h1>
        </div>
    </div>

    <!-- Earning and Expenses Report -->
    <div class="col-md">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Earning and Expenses Report</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="earningsExpensesChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;"></canvas>
            </div>
        </div>
    </div>

    <!-- Registered Member's Report -->
    <div class="col-md">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Registered Member's Report</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="membersChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;"></canvas>
            </div>
        </div>
    </div>

    <!-- Services Report -->
    <div class="col-md">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Services Report</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="servicesChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;"></canvas>
            </div>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Earnings and Expenses Chart
        var ctx1 = document.getElementById('earningsExpensesChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Earnings', 'Expenses'],
                datasets: [{
                    label: 'Total',
                    data: [{{ $earnings }}, {{ $expenses }}],
                    backgroundColor: ['#4CAF50', '#FF6384']
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Registered Members Chart
        var ctx2 = document.getElementById('membersChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Female', 'Male'],
                datasets: [{
                    data: [{{ $femaleCount }}, {{ $maleCount }}],
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            }
        });

        // Services Chart
        var ctx3 = document.getElementById('servicesChart').getContext('2d');
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: @json(array_keys($serviceCounts)),
                datasets: [{
                    label: 'Total',
                    data: @json(array_values($serviceCounts)),
                    backgroundColor: '#36A2EB'
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
