@extends('layouts.app')

@section('content')
    <h2>Attendance Records</h2>

    <a href="{{ route('attendances.create') }}" class="btn">Record Attendance</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Status</th>
                <th>Late Minutes</th>
                <th>Worked Hours</th>
                <th width="180">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->employee->full_name }}</td>
                    <td>{{ $attendance->attendance_date }}</td>
                    <td>{{ $attendance->time_in }}</td>
                    <td>{{ $attendance->time_out }}</td>
                    <td>{{ ucfirst($attendance->status) }}</td>
                    <td>{{ $attendance->late_minutes }}</td>
                    <td>{{ $attendance->worked_hours }}</td>
                    <td>
                        <a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('attendances.destroy', $attendance) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Delete this attendance record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
