<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplyMail;

class ContactController extends Controller
{
    //
    public function sendEmail() {

        Mail::to('runa720.bump@icloud.com')->send( new ApplyMail('あああ','いいい','ううう') );

    }
}
