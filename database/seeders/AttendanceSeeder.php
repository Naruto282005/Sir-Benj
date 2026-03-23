<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            Attendance::updateOrCreate(
                [
                    'employee_id' => $employee->id,
                    'attendance_date' => now()->toDateString(),
                ],
                [
                    'time_in' => '08:15:00',
                    'time_out' => '17:05:00',
                    'remarks' => 'Seeded attendance record',
                ]
            );

            Attendance::updateOrCreate(
                [
                    'employee_id' => $employee->id,
                    'attendance_date' => now()->subDay()->toDateString(),
                ],
                [
                    'time_in' => '07:55:00',
                    'time_out' => '17:00:00',
                    'remarks' => 'Seeded attendance record',
                ]
            );
        }
    }
}
