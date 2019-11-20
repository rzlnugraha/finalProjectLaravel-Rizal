<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $apply;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($apply)
    {
        $this->apply = $apply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lolokeran@mail.com')
                ->subject('Status Lamaran')
                ->view('admin.email.status_job')
                ->with([
                    'job' => $this->apply,
                ]);
    }
}
