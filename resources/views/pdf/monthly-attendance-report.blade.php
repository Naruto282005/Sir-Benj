<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Attendance Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Monthly Attendance Report</h2>
    <p><strong>Employee:</strong> {{ $employee->full_name }}</p>
    <p><strong>Department:</strong> {{ $employee->department->name }}</p>
    <p><strong>Month/Year:</strong> {{ $month }}/{{ $year }}</p>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Status</th>
                <th>Late Minutes</th>
                <th>Worked Hours</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $record)
                <tr>
                    <td>{{ $record->attendance_date }}</td>
                    <td>{{ $record->time_in }}</td>
                    <td>{{ $record->time_out }}</td>
                    <td>{{ ucfirst($record->status) }}</td>
                    <td>{{ $record->late_minutes }}</td>
                    <td>{{ $record->worked_hours }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
