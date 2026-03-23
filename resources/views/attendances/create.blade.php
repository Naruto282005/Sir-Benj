@extends('layouts.app')

@section('content')
    <h2>Record Attendance</h2>

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Employee</label>
            <select name="employee_id" required>
                <option value="">-- Select Employee --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Attendance Date</label>
            <input type="date" name="attendance_date" required>
        </div>

        <div class="mb-3">
            <label>Time In</label>
            <input type="time" name="time_in" required>
        </div>

        <div class="mb-3">
            <label>Time Out</label>
            <input type="time" name="time_out">
        </div>

        <div class="mb-3">
            <label>Remarks</label>
            <textarea name="remarks"></textarea>
        </div>

        <button type="submit" class="btn">Save</button>
    </form>
@endsection
