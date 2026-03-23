<?php

namespace App\Observers;

use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceObserver
{
    public function creating(Attendance $attendance): void
    {
        $this->computeAttendance($attendance);
    }

    public function updating(Attendance $attendance): void
    {
        $this->computeAttendance($attendance);
    }

    private function computeAttendance(Attendance $attendance): void
    {
        $employee = $attendance->employee ?: \App\Models\Employee::find($attendance->employee_id);

        if (! $employee || ! $attendance->attendance_date || ! $attendance->time_in) {
            return;
        }

        $requiredTimeIn = Carbon::parse($attendance->attendance_date . ' ' . $employee->daily_time_in_default);
        $actualTimeIn = Carbon::parse($attendance->attendance_date . ' ' . $attendance->time_in);

        $lateMinutes = $actualTimeIn->greaterThan($requiredTimeIn)
            ? $requiredTimeIn->diffInMinutes($actualTimeIn)
            : 0;

        $attendance->late_minutes = $lateMinutes;

        if ($attendance->time_in && $attendance->time_out) {
            $timeIn = Carbon::parse($attendance->attendance_date . ' ' . $attendance->time_in);
            $timeOut = Carbon::parse($attendance->attendance_date . ' ' . $attendance->time_out);

            if ($timeOut->greaterThan($timeIn)) {
                $attendance->worked_hours = round($timeIn->floatDiffInHours($timeOut), 2);
            }
        }

        if (! $attendance->time_in) {
            $attendance->status = 'absent';
        } elseif ($attendance->late_minutes > 0) {
            $attendance->status = 'late';
        } else {
            $attendance->status = 'present';
        }
    }
}
