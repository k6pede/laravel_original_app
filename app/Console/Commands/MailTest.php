<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplyMailforModify;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailable;
use App\Mail\NoticeMail;
use App\Models\Character;
use Carbon\Carbon;


class MailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MailTest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $month = $now->month;
        $day = $now->day;
        $characters = Character::where('month', $month)->where('day', $day)->orderBy('ruby','asc')->get();
            
        Log::info("info メールを送信しました!");
        Mail::to('runa720.bump@icloud.com')->send( new NoticeMail($characters) );
        
        
        
        return Command::SUCCESS;
    }
}
