<?php

namespace App\Mail;

use App\Models\Communication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
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
        if ($this->communication->getFile() != null) {

            return $this
                ->subject('cvcreator' . ' - ' . $this->communication->getName())
                ->attachData($this->communication->getFile()->get(), $this->communication->getFileName(), [
                    'mime' => $this->communication->getMimeType(),
                ])
                ->markdown('emails.communication', [
                    'communication' => $this->communication
                ]);
        }
        return $this
            ->subject('cvcreator' . ' - ' . $this->communication->getName())
            ->markdown('emails.communication', [
                'communication' => $this->communication
            ]);
    }
}
