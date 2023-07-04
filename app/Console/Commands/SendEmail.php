<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Carbon\Carbon;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to user has event in 30days after';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now_date = Carbon::now()->startOfDay();
   
        $target_date_start = Carbon::now()->addMonthNoOverflow()->startOfDay();
        $target_date_end = Carbon::now()->addMonthNoOverflow()->endOfDay();
        $user_ids = User::orderBy('id')->pluck('id');

        foreach ($user_ids as $user_id) {
            dump($user_id);
            // $events = Event::where('user_id', $user_id)
            //                 ->whereBetween('start_at',[$target_date_start, $target_date_end])
            //                 ->orderBy('start_at')
            //                 ->get();
            // dd($events);
        }



        
       
    }
}
