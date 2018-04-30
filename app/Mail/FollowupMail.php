<?php

namespace App\Mail;

use App\Models\Policy;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FollowupMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Policy[]
     */
    public $policies;

    /**
     * FollowupMail constructor.
     * @param Policy[] $policies
     */
    public function __construct($policies)
    {
        $this->policies = $policies;
    }

    public function build()
    {
        return $this->view('mails.followup');
    }
}
