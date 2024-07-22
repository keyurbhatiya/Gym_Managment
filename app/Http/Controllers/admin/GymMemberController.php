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


  





}
