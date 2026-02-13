<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CareerApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $subject = 'Lamaran Baru: ' . 
                 ($this->details['application']['name'] ?? 'Pelamar') . ' - ' . 
                 ($this->details['karier']->posisi ?? 'Lowongan Kerja');

        $mail = $this->subject($subject)
                    ->view('emails.career-application', [
                        'data' => $this->details
                    ]);

        // Attach the CV
        if (!empty($this->details['cv'])) {
            $cv = $this->details['cv'];
            $mail->attach(
                $cv['path'] ?? '',
                [
                    'as' => $cv['name'] ?? 'CV_Pelamar.pdf',
                    'mime' => $cv['mime'] ?? 'application/pdf'
                ]
            );
        }

        return $mail;
    }
}