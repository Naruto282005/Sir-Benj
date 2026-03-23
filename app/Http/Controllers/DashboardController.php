<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        $employeeCount = Employee::count();
        $presentToday = Attendance::whereDate('attendance_date', $today)->whereIn('status', ['present', 'late'])->count();
        $lateToday = Attendance::whereDate('attendance_date', $today)->where('status', 'late')->count();
        $absentToday = max(0, $employeeCount - $presentToday);

        return view('dashboard', compact(
            'employeeCount',
            'presentToday',
            'lateToday',
            'absentToday'
        ));
    }
}
