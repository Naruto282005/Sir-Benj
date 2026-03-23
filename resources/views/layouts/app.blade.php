<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Attendance System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f5f5; }
        nav { background: #1f2937; padding: 15px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; }
        .container { width: 90%; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        .btn { display: inline-block; padding: 8px 12px; background: #2563eb; color: white; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; }
        .btn-danger { background: #dc2626; }
        .btn-warning { background: #d97706; }
        .mb-3 { margin-bottom: 15px; }
        .alert { padding: 10px; margin-bottom: 15px; background: #d1fae5; border: 1px solid #10b981; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        label { font-weight: bold; }
        .grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; }
        .card { background: #f9fafb; padding: 20px; border-radius: 6px; border: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('departments.index') }}">Departments</a>
        <a href="{{ route('employees.index') }}">Employees</a>
        <a href="{{ route('attendances.index') }}">Attendances</a>
        <a href="{{ route('reports.attendance.form') }}">Reports</a>

        <span style="float:right;">
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </span>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
