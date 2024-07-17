<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    public function dashboard()
    {
        $adminName = Auth::user()->name; // Fetch the admin's name from Auth
        return view('admin.dashboard', compact('adminName'));
    }
    public function showProfile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $admin = Auth::user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.profile')->with('status', 'Password changed successfully');
    }
}
