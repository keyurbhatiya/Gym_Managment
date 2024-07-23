<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        // Fetch all staff members
        $staffs = Staff::all();

        return view('admin.staffs.staff', compact('staffs'));
    }

    //staff entry

    public function showForm()
    {
        return view('admin.staffs.staff-entry');
        // resources\views\admin\staff-entry.blade.php
    }

    public function submitForm(Request $request)
    {
        // Handle form submission
        // Validate and save the data

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:staff,username',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email|max:255|unique:staff,email',
            'address' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'contact_number' => 'required|string|max:15',
        ]);


        // Save the data to the database
        $names = explode(' ', $request->fullname, 2);
        $firstname = $names[0];
        $lastname = isset($names[1]) ? $names[1] : '';

        Staff::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'address' => $request->address,
            'designation' => $request->designation,
            'gender' => $request->gender,
            'contact' => $request->contact_number,
        ]);


        return redirect()->route('staff.index')->with('success', 'Staff member added successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staffs.staff-edit', compact('staff'));
    }

    //staff update

    public function update(Request $request, Staff $staff)
    {
        // Validate the incoming request
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female,other',
            'designation' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            // Add other validation rules as needed
        ]);
        $names = explode(' ', $request->fullname, 2);
        $firstname = $names[0];
        $lastname = isset($names[1]) ? $names[1] : '';
        // Update staff member
        $staff->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'email' => $request->email,
            'address' => $request->address,
            'contact' => $request->contact,
            // Update other fields as needed
        ]);

        // Redirect to the staff list or wherever appropriate
        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    // Method to delete staff member
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }

    // public function showTrainers()
    // {
    //     $trainers = Staff::all(); // Fetch all staff members
    //     dd($trainers);
    //     return view('home', compact('trainers'));
    // }

    public function showTrainers()
    {
       // echo'<h1>dsdFrf</h1>';
        $trainers = Staff::all(); // Fetch all staff members
        return view('home', compact('trainers')); // Pass the data to the home view
    }
}
