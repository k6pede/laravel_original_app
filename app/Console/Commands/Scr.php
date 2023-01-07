<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use Goutte\Client; 
use Illuminate\Http\Request;
use App\Models\Character;
class Scr extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Scr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape url';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        // $geturl = 'https://duckduckgo.com/html/?q=Laravel';
        // $crawler = \Goutte::request('GET', $geturl);
        // $crawler->filter('.result__title .result__a')->each(function ($node) {
        // dump($node->text());
        // });
        //     return Command::SUCCESS;


        // for ($month=1; $month <= 12; $month++) { 
        //     if ($month == 1 || $month == 3) {
        //         $end_day = 31;
        //     } else if ($month == 2) {
        //         $end_day = 28;
        //     } else {
        //         $end_day = 30;
        //     }

        //     for ($day=1; $day <= $end_day; $day++) { 
        //         //テキストを取得
        //         $goutte = GoutteFacade::request('GET', 'https://bd.fan-web.jp/sayhappy_sp.cgi?month='. $month. '&day='. $day);
        //         $texts = array();
        //         $goutte->filter('div center form .wrapper h6 font.ajax-iine')->each(function ($node) use (&$texts) {
        //             dump($node);
                    
        //             $texts[] = $node;
        //         });

        //         sleep(10);
        //     }
        // }
        
        // テキストを取得
    
        
        
        for($month = 1;$month<12;$month++){
            for($day = 1;$day <=31;$day++) {        
                $goutte = GoutteFacade::request('GET', 'https://bd.fan-web.jp/sayhappy_sp.cgi?month='. $month. '&day='. $day);
                $texts = array();
                $data = $goutte->filter('b')->each(function($node,$key) {
                        return array(
                            'name' => $node->filter('b')->text(),
         
                        );
                    });
        
                $title = $goutte->filter('.wrapper h6 a')->each(function($node,$key) {
                        return array(           
                            'title' => $node->text()
                        );
                    });
                for($i=0; $i < count($data); $i++) {
                    if (empty($data[$i]['name'] || empty($anime_data[$i]['title']))) {
                        continue;
                    }
                    print_r($data[$i]['name']);
                    print(": ");
                    print_r($title[$i]['title']);
                    print("\n");
                    print("-------------------------------");
                    print("\n");

                    Character::create([
                        'name' => $data[$i]["name"],
                        'title' =>$title[$i]["title"],
                        'month' =>$month,
                        'day' =>$day
                    ]);
                }
                print($month . "月". $day . "日");
                sleep(1);
            }
            
        }
            // dump($anime_data);
        // $array = array_merge_recursive($data,$anime_data);
            // dump($array);

            // $head = [
            //     'aaa','bbb'
            // ];
            // $f = fopen('text.csv', 'w');
            // if ($f) {
            //     // カラムの書き込み
            //     mb_convert_variables('UTF-8', 'UTF-8', $head);

            //     // データの書き込み
            //     foreach ($anime_data as $d) {
            //        mb_convert_variables('UTF-8', 'UTF-8', $d);
            //        fputcsv($f, $d);
            //     }
            // }
            // // ファイルを閉じる
            // fclose($f);
        // $goutte->filter("b")->each(function ($node,$key) use (&$texts) {
        //     $t = $node->text();
        //     $texts[$key]['name'] = $t;
        //     if($key>10){
        //         return false;
        //     }
            
        //     // dump($texts);
        // });
        
    }

    

}
