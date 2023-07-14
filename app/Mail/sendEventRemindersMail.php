<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class sendEventRemindersMail extends Mailable
{
    use Queueable, SerializesModels;
    public $events;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($events)
    {
        //コンストラクタ　イベントの情報をまとめて渡す
        $this->events = $events;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $from    = new Address('admin@example.com', 'REmemo');
        $subject = '30日後に登録されている予定をお送りします';
        return new Envelope(
            from: $from,
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            text: 'email.reminderevents',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}