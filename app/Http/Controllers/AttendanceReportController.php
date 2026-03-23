<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class AttendanceReportController extends Controller
{
    public function form()
    {
        $employees = Employee::orderBy('first_name')->get();
        return view('reports.form', compact('employees'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2000|max:2100',
        ]);

        $employee = Employee::findOrFail($request->employee_id);

        $records = Attendance::where('employee_id', $employee->id)
            ->whereMonth('attendance_date', $request->month)
            ->whereYear('attendance_date', $request->year)
            ->orderBy('attendance_date')
            ->get();

        return Pdf::view('pdf.monthly-attendance-report', [
            'employee' => $employee,
            'records' => $records,
            'month' => $request->month,
            'year' => $request->year,
        ])->download('attendance-report.pdf');
    }
}
