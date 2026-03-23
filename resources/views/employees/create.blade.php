@extends('layouts.app')

@section('content')
    <h2>Add Employee</h2>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Employee No</label>
            <input type="text" name="employee_no" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone">
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="position" required>
        </div>

        <div class="mb-3">
            <label>Hire Date</label>
            <input type="date" name="hire_date">
        </div>

        <div class="mb-3">
            <label>Default Time In</label>
            <input type="time" name="daily_time_in_default" value="08:00" required>
        </div>

        <div class="mb-3">
            <label>Default Time Out</label>
            <input type="time" name="daily_time_out_default" value="17:00" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn">Save</button>
    </form>
@endsection
