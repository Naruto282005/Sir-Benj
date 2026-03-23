<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => 'Handles employee management and company policies.',
            ],
            [
                'name' => 'Information Technology',
                'description' => 'Handles system development and technical support.',
            ],
            [
                'name' => 'Finance',
                'description' => 'Handles payroll, expenses, and budgeting.',
            ],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                ['name' => $department['name']],
                $department
            );
        }
    }
}
