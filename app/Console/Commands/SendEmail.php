<?php

namespace App\Console\Commands;

use App\Mail\sendEventRemindersMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\EmailSubscriber;
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
        //$now_date = Carbon::now()->startOfDay();
        
        // 探索範囲　30日後の予定
        // $target_date_start = Carbon::now()->addMonthNoOverflow()->startOfDay();
        // $target_date_end = Carbon::now()->addMonthNoOverflow()->endOfDay();

        // 来月の初めの日00:00:00 ,末日23:59:59
        $startOfNextMonth = Carbon::now()->addMonth()->startOfMonth();
        $endOfNextMonth = Carbon::now()->addMonth()->endOfMonth();

        // 来月のyear,month
        $nextMonth = Carbon::now()->addMonth()->month;
        $yearOfNextMonth = Carbon::now()->addMonth()->year;

        $nextmonth_and_year = [
            'nextmonth' => $nextMonth,
            'yearOfNextMonth' => $yearOfNextMonth,
        ];

        // 対象ユーザーの取得
        $email_subscribers = EmailSubscriber::orderBy('user_id')->get();

        if (config('app.env') === 'local') {
            
            // ローカル環境
            // 対象ユーザがいない場合、ログにその旨を記述して終了する
            if($email_subscribers->isEmpty()) {
                Log::info('no subscribers');
                return;
            };
            // メール送信処理　
            
            foreach ($email_subscribers as $email_subscriber) {

                $subscriber_id = $email_subscriber->user_id;
                $user = User::find($subscriber_id);
                $user_name = $user->name;
                //$user_email =$user->email;

                //テスト用
                $user_email = 'runa720.bump@icloud.com';
    
                $subscribers_events = Event::where('user_id', $subscriber_id)
                                ->whereBetween('start_at',[$startOfNextMonth, $endOfNextMonth])
                                ->orderBy('start_at')
                                ->get();

                $events = collect();

                foreach ($subscribers_events as $subscriber_event) {
                    $event_data = [
                        'title' => $subscriber_event->title,
                        'start_at' => $subscriber_event->start_at,
                    ];
                    


                    $events->push((object)$event_data);
                }

                $user_info = [
                    'user_name' => $user_name,
                    'user_email' => $user_email,
                ];

                

                


                Mail::to($user_email)->send( new sendEventRemindersMail($events, $user_info, $nextmonth_and_year));
    
     
            }

            

        } elseif (config('app.env') === 'production') {

            // 本番環境
            if($email_subscribers->isEmpty()) {
                Log::info('no subscribers');
                return;
            };

            // メール送信処理　
            
            foreach ($email_subscribers as $email_subscriber) {

                $subscriber_id = $email_subscriber->user_id;
                $user = User::find($subscriber_id);
                $user_name = $user->name;
                //$user_email =$user->email;

                //テスト用
                $user_email = 'runa720.bump@icloud.com';
    
                $subscribers_events = Event::where('user_id', $subscriber_id)
                                ->whereBetween('start_at',[$startOfNextMonth, $endOfNextMonth])
                                ->orderBy('start_at')
                                ->get();

                $events = collect();

                foreach ($subscribers_events as $subscriber_event) {
                    $event_data = [
                        'title' => $subscriber_event->title,
                        'start_at' => $subscriber_event->start_at,
                    ];
                    


                    $events->push((object)$event_data);
                }

                $user_info = [
                    'user_name' => $user_name,
                    'user_email' => $user_email,
                ];

                

                


                Mail::to($user_email)->send( new sendEventRemindersMail($events, $user_info, $nextmonth_and_year));
    
     
            }
            
            

        }

        

        // foreach ($email_subscribers as $email_subscriber) {

        //     $subscriber_id = $email_subscriber->user_id;
        //     $user = User::find($subscriber_id);
        //     $user_name = $user->name;
        //     $user_email =$user->email;

        //     $events = Event::where('user_id', $user_id)
        //                     ->whereBetween('start_at',[$target_date_start, $target_date_end])
        //                     ->orderBy('start_at')
        //                     ->get();

 
        // }
        
    






        
       
    }
}
