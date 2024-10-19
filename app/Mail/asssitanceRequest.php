<?php

namespace App\Mail;

use App\Models\Demande_Assistance;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class asssitanceRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Demande_Assistance $demande_Assistance)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('moussandaodevpro@gmail.com', 'Sen Mecanique'),
            subject: 'Demande asssistance',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend/assistance/pages/demandeAssistance',
            with: [
                'id' => $this->demande_Assistance->id,
                'type_service' => $this->demande_Assistance->type_service,
                'description_probleme'=> $this->demande_Assistance->description_probleme,
                "nom_garage" => $this->demande_Assistance->garage->User->name,
                "user_infos"=>[
                    "name" => $this->demande_Assistance->user->name,
                    "email"=> $this->demande_Assistance->user->email,
                ],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
