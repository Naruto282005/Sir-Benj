@extends('layouts.app')

@section('content')
    <h2>Edit Attendance</h2>

    <form action="{{ route('attendances.update', $attendance) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Employee</label>
            <select name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->full_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Attendance Date</label>
            <input type="date" name="attendance_date" value="{{ $attendance->attendance_date }}" required>
        </div>

        <div class="mb-3">
            <label>Time In</label>
            <input type="time" name="time_in" value="{{ $attendance->time_in }}" required>
        </div>

        <div class="mb-3">
            <label>Time Out</label>
            <input type="time" name="time_out" value="{{ $attendance->time_out }}">
        </div>

        <div class="mb-3">
            <label>Remarks</label>
            <textarea name="remarks">{{ $attendance->remarks }}</textarea>
        </div>

        <button type="submit" class="btn">Update</button>
    </form>
@endsection
