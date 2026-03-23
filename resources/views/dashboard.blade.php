@extends('layouts.app')

@section('content')
    <h2>Dashboard</h2>

    <div class="grid">
        <div class="card">
            <h3>Total Employees</h3>
            <p>{{ $employeeCount }}</p>
        </div>
        <div class="card">
            <h3>Present Today</h3>
            <p>{{ $presentToday }}</p>
        </div>
        <div class="card">
            <h3>Late Today</h3>
            <p>{{ $lateToday }}</p>
        </div>
        <div class="card">
            <h3>Absent Today</h3>
            <p>{{ $absentToday }}</p>
        </div>
    </div>
@endsection
