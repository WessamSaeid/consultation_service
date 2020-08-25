<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationRequest extends Mailable
{
    use Queueable, SerializesModels;

    protected $consultationDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultationDetails)
    {
       $this->consultationDetails = $consultationDetails; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.consultation', [
            'consultationDetails' => $this->consultationDetails
        ]);
    }
}
