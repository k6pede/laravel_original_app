<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ApplyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $title;
    public $comment;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$title,$comment)
    {
        //
        $this->name = $name;
        $this->title = $title;
        $this->comment = $comment;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        
        $from    = new Address('admin@example.com', 'REmemo');
        $subject = '【REmemo】お問合せ有難うございます';
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
            text: 'email.applycharacter',
            // with: [
            //     'name' => $name,
            //     'title' => $title,
            //     'comment' => $comment,
            // ]
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
