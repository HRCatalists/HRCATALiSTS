<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }
    public function build()
    {
        // ✅ Generate the correct reset link
        $resetUrl = route('custom.password.reset', ['token' => $this->token]) . '?email=' . urlencode($this->email);

    
        return $this->subject('Reset Your Password')
            ->view('emails.password-reset')
            ->with([
                'resetUrl' => $resetUrl
            ]);
    }
    
    }

