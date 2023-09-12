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
    public $user_info;
    public $nextmonth_and_year;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($events, $user_info, $nextmonth_and_year)
    {
        //コンストラクタ　イベントの情報をまとめて渡す
        $this->events = $events;
        $this->user_info = $user_info;
        $this->nextmonth_and_year = $nextmonth_and_year;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        // 発信元アドレス
        $from    = new Address('admin@example.com', 'REmemo');

        // 件名
        $subject = '【REmemo】来月のご予定をお知らせいたします!';
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
