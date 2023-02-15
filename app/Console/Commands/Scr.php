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
        ///urlを叩いてスクレイピング
        // $title = DB::table('characters')->select('title')->distinct()->get();
        // $count = intval(count($title));
        $count = 1;
        
        
   
        
        for ($j=0; $j < $count; $j++) { 
            
            // $title_str = $title[$j]->title;
            $title_str = 'ゆるキャン△';
            
            $url = "https://days366.com/search.cgi?mode=search&word=$title_str";
            $goutte = GoutteFacade::request('GET', $url);
            $data = [];
            $data_key = 0;
            $tmp_data = null;

            //作品ページへのurl
            $titleUrl = $goutte->filter('#sub .bnr .list li a')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
                $href = $node->filter('a')->attr("href");
                $href = strval($href);
                return $href;
            });
            // print($titleUrl[0]);

            $goutte = GoutteFacade::request('GET', $titleUrl[0]);
            //作品の情報
            
            $data["title"] = $goutte->filter('#sub h2')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
                $text = $node->filter('h2')->text();
                return $text;
                
                
            });
            print_r($data["title"][0]);
            // $data["name"] = $goutte->filter('div h3 ruby')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
            //     $text = $node->filter('ruby')->text();
            //     if($text == '-'){
            //         return '-';
            //     }
            //     $text = explode("/", $text);
            //     return $text[0];
            // });

            // $data["ruby"] = $goutte->filter('div h3 ruby rt')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
            //     $text = $node->filter('rt')->text();
            //     if($text == '-'){
            //         return '-';
            //     }
            //     return $text;
            // });

            // $data["gender"] = $goutte->filter('.col_two_one ul li h4')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
            //     $text = $node->filter('h4')->text();
            //     if($text == '-'){
            //         return '-';
            //     }
            //     if(strpos($text, "性別") !==false){

            //         if(strpos($text, "男性") || strpos($text, "女性")) {
                        
            //             $text = explode(" ", $text);
            //             return $text[1];
            //         }
            //         elseif(strpos($text, "性別不明")){
            //             $text = explode(" ", $text);
            //             return $text[1];
            //         }
            //         else{
            //             return '-';
            //         }
            //     }
                
                
            // });

            // $data["blood"] = $goutte->filter('.col_two_one ul li h4')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
            //     $text = $node->filter('h4')->text();
            //     if($text == '-'){
            //         return '-';
            //     }
                
            //     if (strpos($text, "血液型") !==false ) {
            //         $text = explode(" ", $text);
            //         if(empty($text[1]) ){
            //             return 'O';
            //         }else{
            //             return $text[1];
            //         }
            //     }
            // });


            // $data["dob"] = array_filter($data["dob"]);
            // $data["dob"] = str_replace('生', '', $data["dob"]);


            // $data["gender"] = array_filter($data["gender"]);

            // $data["blood"] = array_filter($data["blood"]);
            
            // $data["name"] = array_filter($data["name"]);
            // $data["ruby"] = array_filter($data["ruby"]);

            
            // $dob_data = [];
            // $i=0;
            // foreach ($data["dob"] as $key => $value) {
            //     if($value == '-'){
            //         $dob_data[$i]['month'] = null;
            //         $dob_data[$i]['day'] = null;
            //     }else{
            //         $devided_dob = explode('月',$value);
            //         $dob_data[$i]['month'] = $devided_dob[0];
            //         $devided_dob_day = explode('日',$devided_dob[1]);
            //         $dob_data[$i]['day'] = $devided_dob_day[0];
            //     }
            //     $i++;
            // }
            // $i=0;
            // $gender_data = [];
            // foreach ($data["gender"] as $key => $value) {
                
            //     $gender_data[$i] = $value;
                
            //     $i++;
            // }
            // $blood_data = [];
            // $i=0;
            // foreach ($data["blood"] as $key => $value) {
                
            //     $blood_data[$i] = $value;
                
            //     $i++;
            // }
            
            // // それぞれのデータを挿入
            
            for ($i=0; $i < count($data["name"]); $i++) { 
                
                print($data["title"][$i]);
                echo "\n";
                

                
                
                Title::updateOrCreate(['title' => $data["title"][0]],[
                        'title' => $data["title"][0],
                        
                    
                    ]);
                
                
                    
                }
                
                
                
            }
            
            sleep(1);

        }
       
         
        


        
            
        
    }

    


