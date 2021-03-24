<?php

namespace App\Mail;

use App\Models\Communication;
use Illuminate\Bus\Queueable;
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
    private $_communication;

    /**
     * Create a new message instance.
     *
     * @param Communication $communication
     */
    public function __construct(Communication $communication)
    {
        $this->_communication = $communication;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->_communication->email, $this->_communication->name)
            ->subject($this->_communication->subject)
            ->attachData($this->_communication->file, $this->_communication->fileName, [
                'mime' => $this->_communication->fileExtension,
            ])
            ->markdown('emails.communication', [
                'telephone' => $this->_communication->telephone,
                'details' => $this->_communication->details
            ]);
    }
}
