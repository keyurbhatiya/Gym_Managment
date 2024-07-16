<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // public function index()
    // {
    //     //echo'<h1>hello</h1>';
    //     $current_date = Carbon::now()->format('Y-m-d');
    //     $members = Member::where('status', 'Active')->get();

    //     return view('admin.attendance', compact('members', 'current_date'));
    // }
    //admin\attendance.blade.php


    public function index()
    {
        $current_date = Carbon::now()->format('Y-m-d');
        // Fetch members with their attendance count
        $members = Member::where('status', 'Active')
            ->withCount('attendance')
            ->get();

        return view('admin.attendance', compact('members', 'current_date'));
    }

    public function checkIn($id)
    {
        $current_date = Carbon::now()->format('Y-m-d');
        $current_time = Carbon::now()->format('h:i A');

        Attendance::create([
            'user_id' => $id,
            'curr_date' => $current_date,
            'curr_time' => $current_time,
        ]);

        return redirect()->route('attendance.index');
    }

    public function checkOut($id)
    {
        $current_date = Carbon::now()->format('Y-m-d');
        Attendance::where('user_id', $id)->where('curr_date', $current_date)->delete();

        return redirect()->route('attendance.index');
    }

    public function show()
    {
        $current_date = Carbon::now()->format('Y-m-d');

        // Fetch members with their attendance count
        $members = Member::where('status', 'Active')
            ->withCount('attendance')
            ->get();

        return view('admin.attendance-view', compact('members', 'current_date'));
    }
}
