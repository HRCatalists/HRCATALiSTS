<?php



namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterviewScheduled extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;
    public $scheduleDate;
    public $scheduleTime;

    public function __construct($applicant, $scheduleDate, $scheduleTime)
    {
        $this->applicant = $applicant;
        $this->scheduleDate = $scheduleDate;
        $this->scheduleTime = $scheduleTime;
    }

    public function build()
    {
        return $this->subject('Interview Scheduled')
                    ->view('emails.interview-scheduled');
    }
}
