@extends('layouts.app')

@section('content')
    <h2>Generate Attendance Report</h2>

    <form action="{{ route('reports.attendance.generate') }}" method="POST">
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
            <label>Month</label>
            <input type="number" name="month" min="1" max="12" required>
        </div>

        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" min="2000" max="2100" required>
        </div>

        <button type="submit" class="btn">Download PDF</button>
    </form>
@endsection
