<?php

namespace App\Jobs;

use App\Mail\KirimEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Mail;

class EmailStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $apply;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($apply)
    {
        $this->apply = $apply;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info('Ini status apply an dari email '.$this->apply->user->first_name.' '.$this->apply->user->last_name.' Dengan email '.$this->apply->user->email);
        Mail::to($this->apply->user->email)->send(new KirimEmail($this->apply));
    }
}
