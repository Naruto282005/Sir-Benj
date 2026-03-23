@extends('layouts.app')

@section('content')
    <h2>Edit Employee</h2>

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Employee No</label>
            <input type="text" name="employee_no" value="{{ $employee->employee_no }}" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ $employee->first_name }}" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ $employee->last_name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $employee->email }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $employee->phone }}">
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="position" value="{{ $employee->position }}" required>
        </div>

        <div class="mb-3">
            <label>Hire Date</label>
            <input type="date" name="hire_date" value="{{ $employee->hire_date }}">
        </div>

        <div class="mb-3">
            <label>Default Time In</label>
            <input type="time" name="daily_time_in_default" value="{{ $employee->daily_time_in_default }}" required>
        </div>

        <div class="mb-3">
            <label>Default Time Out</label>
            <input type="time" name="daily_time_out_default" value="{{ $employee->daily_time_out_default }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" required>
                <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn">Update</button>
    </form>
@endsection
