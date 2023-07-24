<?php

namespace App\Console\Commands;

use App\Mail\sendEventRemindersMail;
use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Carbon\Carbon;
use stdClass;

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
        $users = User::orderBy('id')->get();
        

        // foreach ($users as $user) {
        //     $user_id = $user->id;
        //     $user_email = $user->email;
            
        //     $events = Event::where('user_id', $user_id)
        //                     ->whereBetween('start_at',[$target_date_start, $target_date_end])
        //                     ->orderBy('start_at')
        //                     ->get();
            
            
        // }
        $user_email = 'runa720.bump@icloud.com';

        $events = collect([
            (object) ['title' => 'Event 1'],
            (object) ['title' => 'Event 2'],
            (object) ['title' => 'Event 3'],
        ]);
        Mail::to($user_email)->send( new sendEventRemindersMail($events));



        
       
    }
}
