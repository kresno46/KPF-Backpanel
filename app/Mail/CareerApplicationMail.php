<?php

namespace App\Mail;

use App\Models\Karier;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $karier;

    public function __construct(Karier $karier)
    {
        $this->karier = $karier;
    }

    public function build()
    {
        return $this->subject('Lowongan Kerja Baru: ' . $this->karier->posisi . ' - ' . $this->karier->nama_kota)
                    ->view('emails.career-application');
    }
}
