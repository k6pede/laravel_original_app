<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ModifyUserMail extends Mailable
{
    use Queueable, SerializesModels;
   
    public $inputs;
    
    // 新規キャラクター登録依頼を送信したユーザー様に、
    // 依頼内容を確認するメールです。


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        //
        $this->inputs = $inputs;
       
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    //送信メールのヘッダーと宛先情報
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
            //views.email.applycharacterに記述されたコードをメールのコンテンツ（text）として送信している
            // html: 'email.applycharacter',
            text: 'email.modifymail_to_user',
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
