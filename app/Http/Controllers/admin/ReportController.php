<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Attendance;

class ReportController extends Controller
{
    public function index()
    {
        // Sample data fetching logic
        $earnings = 2000; // Replace with your logic
        $expenses = 5000; // Replace with your logic

        $maleCount = Member::where('gender', 'male')->count();
        $femaleCount = Member::where('gender', 'female')->count();

        $serviceCounts = [
            'Cardio' => 6, // Replace with your logic
            'Fitness' => 10, // Replace with your logic
            'Sauna' => 4 // Replace with your logic
        ];

        return view('admin.reports.reports', compact('earnings', 'expenses', 'maleCount', 'femaleCount', 'serviceCounts'));
    }
}
