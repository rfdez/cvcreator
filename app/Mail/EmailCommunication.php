<?php

namespace App\Mail;

use App\Models\Communication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailCommunication extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The communication instance.
     *
     * @var Communication
     */
    private $communication;

    /**
     * Create a new message instance.
     *
     * @param Communication $communication
     */
    public function __construct(Communication $communication)
    {
        $this->communication = $communication;
    }

    /**
     * Build the message.
     *
     * @return $this
     * @throws FileNotFoundException
     */
    public function build(): EmailCommunication
    {
        return $this
            ->subject($this->communication->getSubject())
            ->attachData($this->communication->getFile()->get(), $this->communication->getFileName(), [
                'mime' => $this->communication->getMimeType(),
            ])
            ->markdown('emails.communication', [
                'communication' => $this->communication
            ]);
    }
}
