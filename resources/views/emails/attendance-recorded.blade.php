<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Attendance Recorded</title>
</head>
<body>
    <h2>Attendance Recorded</h2>

    <p>Hello {{ $attendance->employee->full_name }},</p>

    <p>Your attendance has been recorded successfully.</p>

    <ul>
        <li>Date: {{ $attendance->attendance_date }}</li>
        <li>Time In: {{ $attendance->time_in }}</li>
        <li>Time Out: {{ $attendance->time_out ?? 'N/A' }}</li>
        <li>Status: {{ ucfirst($attendance->status) }}</li>
        <li>Late Minutes: {{ $attendance->late_minutes }}</li>
    </ul>

    <p>Thank you.</p>
</body>
</html>
