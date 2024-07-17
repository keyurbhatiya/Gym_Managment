@extends('layouts.app')
@section('title', 'Report')
@section('head')
    <!-- Add this to your head section -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 10%;
            max-width: 10px; /* Adjust the max-width as needed */
            margin: 0 auto;
        }
        canvas {
            width: 50% !important;
            height: 50px !important; /* Adjust the height as needed */
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="mt-2">
    <div class="chart-container">
        <h2 class="mt-5">Earning and Expenses Report <i class="fas fa-chart-bar"></i></h2>
        <canvas id="earningsExpensesChart"></canvas>
    </div>

    <div class="chart-container">
        <h2 class="mt-5">Registered Member's Report <i class="fas fa-chart-pie"></i></h2>
        <canvas id="membersChart"></canvas>
    </div>

    <div class="chart-container">
        <h2 class="mt-5">Services Report <i class="fas fa-chart-bar"></i></h2>
        <canvas id="servicesChart"></canvas>
    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
                    xAxes: [{ ticks: { beginAtZero: true } }],
                    yAxes: [{ ticks: { beginAtZero: true } }]
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
                    xAxes: [{ ticks: { beginAtZero: true } }],
                    yAxes: [{ ticks: { beginAtZero: true } }]
                }
            }
        });
    });
</script>
@endsection
