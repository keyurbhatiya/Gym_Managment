@extends('layouts.app')

@section('title', 'Payment Form')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Payment Form</h2>
    <div class="card">
        <div class="card-body">
            <h3>Perfect GYM Club</h3>
            <p>5021 Wetzel Lane, Williamsburg<br>
               Tel: 231-267-6011<br>
               Email: support@perfectgym.com</p>
            <form action="{{ route('members.processPayment', $member->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Member's Fullname:</label>
                    <input type="text" class="form-control" value="{{ $member->fullname }}" readonly>
                </div>
                <div class="form-group">
                    <label>Services:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="service" id="fitness" value="fitness" {{ $member->service == 'fitness' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="fitness">Fitness - 550 per month</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="service" id="sauna" value="sauna" {{ $member->service == 'sauna' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sauna">Sauna - 350 per month</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="service" id="cardio" value="cardio" {{ $member->service == 'cardio' ? 'checked' : '' }}>
                        <label class="form-check-label" for="cardio">Cardio - 400 per month</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Amount Per Month:</label>
                    <input type="number" class="form-control" name="amount" id="amount" value="{{ $member->amount }}" readonly>
                </div>
                <div class="form-group">
                    <label>Plan:</label>
                    <select class="form-control" name="plan" id="plan">
                        <option value="one_month" {{ $member->plan == 'one_month' ? 'selected' : '' }}>One Month</option>
                        <option value="three_months" {{ $member->plan == 'three_months' ? 'selected' : '' }}>Three Months</option>
                        <option value="six_months" {{ $member->plan == 'six_months' ? 'selected' : '' }}>Six Months</option>
                        <option value="one_year" {{ $member->plan == 'one_year' ? 'selected' : '' }}>One Year</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Total to Pay:</label>
                    <input type="number" class="form-control" id="total" readonly>
                </div>
                <div class="form-group">
                    <label>Member's Status:</label>
                    <input type="text" class="form-control" value="{{ $member->expired ? 'Expired' : 'Active' }}" readonly>
                </div>
                <button type="submit" class="btn btn-success">Make Payment</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const services = {
            fitness: 550,
            sauna: 350,
            cardio: 400
        };

        const plans = {
            one_month: 1,
            three_months: 3,
            six_months: 6,
            one_year: 12
        };

        const serviceInputs = document.querySelectorAll('input[name="service"]');
        const planSelect = document.getElementById('plan');
        const amountInput = document.getElementById('amount');
        const totalInput = document.getElementById('total');

        function updateAmountAndTotal() {
            let selectedService = document.querySelector('input[name="service"]:checked').value;
            let selectedPlan = planSelect.value;

            let amount = services[selectedService];
            let total = amount * plans[selectedPlan];

            amountInput.value = amount;
            totalInput.value = total;
        }

        serviceInputs.forEach(input => {
            input.addEventListener('change', updateAmountAndTotal);
        });

        planSelect.addEventListener('change', updateAmountAndTotal);

        updateAmountAndTotal(); // Initial calculation
    });
</script>
@endsection
