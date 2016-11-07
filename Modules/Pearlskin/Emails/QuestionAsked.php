<?php

namespace Modules\Pearlskin\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Pearlskin\Entities\EmailMessage;

class QuestionAsked extends Mailable
{
    use Queueable, SerializesModels;

    /** @var  EmailMessage $emailMessage */
    protected $emailMessage;

    public function __construct(EmailMessage $emailMessage)
    {
        $this->emailMessage = $emailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->emailMessage->sender_email, $this->emailMessage->sender_names)
            ->subject($this->emailMessage->message_subject)
            ->to($this->emailMessage->receiver_email)
            ->view('pearlskin::emails.question')
            ->with(compact('emailMessage'));
    }
}
