<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $hr = Department::where('name', 'Human Resources')->first();
        $it = Department::where('name', 'Information Technology')->first();
        $finance = Department::where('name', 'Finance')->first();

        $employees = [
            [
                'employee_no' => 'EMP-001',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'phone' => '09123456781',
                'department_id' => $hr?->id,
                'position' => 'HR Officer',
                'hire_date' => '2024-01-10',
                'daily_time_in_default' => '08:00:00',
                'daily_time_out_default' => '17:00:00',
                'status' => 'active',
            ],
            [
                'employee_no' => 'EMP-002',
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane@example.com',
                'phone' => '09123456782',
                'department_id' => $it?->id,
                'position' => 'System Developer',
                'hire_date' => '2024-02-15',
                'daily_time_in_default' => '08:00:00',
                'daily_time_out_default' => '17:00:00',
                'status' => 'active',
            ],
            [
                'employee_no' => 'EMP-003',
                'first_name' => 'Mark',
                'last_name' => 'Lee',
                'email' => 'mark@example.com',
                'phone' => '09123456783',
                'department_id' => $finance?->id,
                'position' => 'Finance Assistant',
                'hire_date' => '2024-03-01',
                'daily_time_in_default' => '08:00:00',
                'daily_time_out_default' => '17:00:00',
                'status' => 'active',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::updateOrCreate(
                ['employee_no' => $employee['employee_no']],
                $employee
            );
        }
    }
}
