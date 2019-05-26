<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LabResult extends Mailable
{
    use Queueable, SerializesModels;
    public $resultLab;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $resultLab)
    {
        $this->resultLab = $resultLab;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Kết quả xét nghiệm')->view('frontend.mails.lab_result');
    }
}
