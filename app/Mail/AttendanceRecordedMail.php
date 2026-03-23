<?php

namespace App\Mail;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class AttendanceRecordedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Attendance $attendance;

    public function __construct(Attendance $attendance)
    {
        $this->attendance = $attendance;
    }

    public function build()
    {
        return $this->subject('Attendance Recorded')
            ->view('emails.attendance-recorded');
    }
}
