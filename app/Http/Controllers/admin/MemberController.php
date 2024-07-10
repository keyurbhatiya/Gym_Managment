<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{

    public function index()
    {
        return view('admin.member-entry-form');
    }
    public function store(Request $request)
    {

        echo'<h1>hello</h1>';
        // $validatedData = $request->validate([
        //     'fullname' => 'required|string|max:255',
        //     'username' => 'required|string|max:255|unique:members',
        //     'password' => 'required|string|min:8',
        //     'gender' => 'required|string',
        //     'dor' => 'required|date',
        //     'plan' => 'required|string',
        //     'contact_number' => 'required|string|max:15',
        //     'address' => 'required|string|max:255',
        //     'service' => 'required|string',
        //     'total_amount' => 'required|numeric|min:0',
        // ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        // Member::create($validatedData);

        // return redirect()->back()->with('success', 'Member details submitted successfully.');
    }
}
