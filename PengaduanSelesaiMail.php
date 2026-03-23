<?php

namespace App\Mail;

use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengaduanSelesaiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;

    /**
     * Create a new message instance.
     */
    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Pengaduan Anda Telah Selesai')
                    ->view('emails.pengaduan-selesai');
    }
}