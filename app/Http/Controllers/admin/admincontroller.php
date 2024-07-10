<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class admincontroller extends Controller
{
    public function dashboard()
    {
        $adminName = Auth::user()->name; // Fetch the admin's name from Auth
        return view('admin.dashboard', compact('adminName'));
    }

}
