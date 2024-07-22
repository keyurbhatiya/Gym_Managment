<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class PaymentController extends Controller
{
    //Payment
    public function showPaymentList()
    {
        $members = Member::all();
        return view('admin.payments.members_payment_list', compact('members'));
    }

    public function showPaymentForm($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.payments.payment_form', compact('member'));
    }
    public function processPayment(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric',
            'plan' => 'required|in:one_month,three_months,six_months,one_year',
            'service' => 'required|in:fitness,sauna,cardio',
        ]);

        // Calculate total amount based on selected plan
        $services = [
            'fitness' => 550,
            'sauna' => 350,
            'cardio' => 400,
        ];

        $plans = [
            'one_month' => 1,
            'three_months' => 3,
            'six_months' => 6,
            'one_year' => 12,
        ];

        $amount = $services[$request->service];
        $planMonths = $plans[$request->plan];
        $total_amount = $amount * $planMonths;

        // Update member record with payment details
        $member->update([
            'amount' => $amount,
            'plan' => $request->plan,
            'service' => $request->service,
            'total_amount' => $total_amount,
        ]);

        // Redirect back with success message
        return redirect()->route('members.paymentList')->with('success', 'Payment processed successfully');
    }


}
