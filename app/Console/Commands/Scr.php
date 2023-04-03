<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use Goutte\Client; 
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Title;
use Illuminate\Support\Facades\DB;
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
     

        //日付ごとのキャラクターの名前、作品名をそれぞれ取得し、charactersテーブルに保存する


        // for($m=1;$m<=12;$m++){

            $m = 5;
            $days_in_month = date('t', mktime(0,0,0,$m,1));
            $data_key = 0;
            $tmp_data = null;

            // for($d=1;$d<=$days_in_month;$d++) {
                $d = 21;
                $url = "https://bd.fan-web.jp/sayhappy_sp.cgi?month=$m&day=$d";
                
                    $goutte = GoutteFacade::request('GET',$url);
                    $data = [];
                    $data["name"] = $goutte->filter('.wrapper font b')->each(function($node,$key) use ($data, $data_key, $tmp_data) {                        
                        $text = $node->filter('b')->text();
                        return $text;
                    });

                    //$data["name"]の数だけ
                    $data["title"] = $goutte->filter('.wrapper a')->each(function($node,$key) use ($data, $data_key, $tmp_data) {                        
                        $text = $node->filter('a')->text();
                        return $text;
                    });
                    // print_r($m."月".$d."日");
                    // echo "\n";
                    // print_r($url);
                    // echo "\n";
                    // print_r($data["name"]);
                    // echo "\n";
                    
                    // for($j=0;$j<count($data["name"]);$j++){

                    //     print_r($data["title"][$j]);
                    //     echo "\n";
                    // }
                    // echo "\n";
                    // echo "-----------------------";
                    // echo "\n";



                    //テーブルに書き込み
                    print_r($m."月".$d."日");
                    echo "\n";
                    echo "-----------------------";
                    for ($i=0; $i < count($data["name"]); $i++) { 

                        print_r($data["name"][$i]);
                        echo "\n";
                        print_r($data["title"][$i]);
                        echo "\n";
                        echo "-----------------------";
                        echo "\n";


                        // Character::updateOrCreate(['name' => $data["name"][$i], 'title'=> $data["title"][$i]],[
                        //     'name' => $data["name"][$i],
                        //     'title' => $data["title"][$i],
                        //     'month' => $m,
                        //     'day' => $d,
            
                        // ]);
                    }


                    sleep(1);
            //}
           

        //}

    
    }
}