<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Equipment;

class GymMemberController extends Controller
{
    //members
    public function index()
    {
        return view('admin.members.member-entry-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:members',
            'password' => 'required|string|min:8',
            'gender' => 'required|string',
            'dor' => 'required|date',
            'plan' => 'required|string',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'service' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Member::create($validatedData);

        return redirect()->back()->with('success', 'Member details submitted successfully.');
    }

    public function list()
    {
        $members = Member::all();
        return view('admin.members.members-list', compact('members'));
    }

    public function updatemembers()
    {
        $members = Member::all();
        return view('admin.members.update-member-details', compact('members'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.members.members-edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:male,female',
            'contact_number' => 'required|string|max:20',
            'dor' => 'required|date',
            'address' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            'service' => 'required|in:fitness,sauna,cardio',
            'plan' => 'required|in:one_month,three_months,six_months,one_year',
        ]);

        if ($request->filled('password')) {
            $member->password = bcrypt($request->password);
        }

        $member->update($request->all());

        return redirect()->route('members.list')->with('success', 'Member details updated successfully.');
    }

    //member status

    public function showStatus()
    {
        $members = Member::paginate(10);
        return view('admin.members.members-status', compact('members'));
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.members.list')->with('success', 'Member deleted successfully.');
    }

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


    // Equipment functions

    public function equipmentIndex()
    {
        return view('admin.equipments.equipment-entry-form');
    }

    public function equipmentStore(Request $request)
    {
        $validatedData = $request->validate([
            'equipment' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'dop' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'vendor' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'cost_per_item' => 'required|numeric|min:0',
        ]);

        Equipment::create($validatedData);

        return redirect()->back()->with('success', 'Equipment details submitted successfully.');
    }

    public function equipmentList()
    {
        $equipment = Equipment::all();
        return view('admin.equipments.equipment-list', compact('equipment'));
    }

    public function equipmentEdit($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('admin.equipments.equipment-edit', compact('equipment'));
    }

    public function equipmentUpdate(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $request->validate([
            'equipment' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'dop' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'vendor' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'cost_per_item' => 'required|numeric|min:0',
        ]);

        $equipment->update($request->all());

        return redirect()->route('equipment.list')->with('success', 'Equipment details updated successfully.');
    }

    public function equipmentDestroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()->route('equipment.list')->with('success', 'Equipment deleted successfully.');
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
