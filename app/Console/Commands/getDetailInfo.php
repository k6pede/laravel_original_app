<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use Goutte\Client; 
use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\DB;

class getDetailInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getDetail';

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
        

        //urlを叩いてスクレイピング
        //charactersの内容を参照し、詳細情報の追加
        $title = DB::table('characters')->select('title')->distinct()->get();
        $count = intval(count($title));
        // $count = 1;
        
        
   
        
        for ($j=0; $j < $count; $j++) { 
            
            $title_str = $title[$j]->title;
         
            for ($page=1; $page< 6; $page++){
                $url = "https://days366.com/search.cgi?page={$page}&mode=search&sort=time_old&word={$title_str}&engine=pre&search_kt=&search_day=&use_str=&method=and";
                $goutte = GoutteFacade::request('GET', $url);
            $data = [];
            $data_key = 0;
            $tmp_data = null;

            //キャラクターの情報
            
            $data["dob"] = $goutte->filter('.col_two_one ul li h4')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
                $text = $node->filter('h4')->text();
                if($text == '-'){
                    return '-';
                }
                
                if (preg_match("/^[0-9]/", $text)) {
                    
                    
                    if (strpos($text, "日生")) {
                        return $text;
                    }
                }else {
                    if ($text == '-月-日生'){
                        return '404月404日生';
                    }
                }
            });
            $data["name"] = $goutte->filter('div h3 ruby')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
                $text = $node->filter('ruby')->text();
                if($text == '-'){
                    return '-';
                }
                $text = explode("/", $text);
                return $text[0];
            });

            $data["ruby"] = $goutte->filter('div h3 ruby rt')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
                $text = $node->filter('rt')->text();
                if($text == '-'){
                    return '-';
                }
                return $text;
            });

            $data["gender"] = $goutte->filter('.col_two_one ul li h4')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
                $text = $node->filter('h4')->text();
                if($text == '-'){
                    return '-';
                }
                if(strpos($text, "性別") !==false){

                    if(strpos($text, "男性") || strpos($text, "女性")) {
                        
                        $text = explode(" ", $text);
                        return $text[1];
                    }
                    elseif(strpos($text, "性別不明")){
                        $text = explode(" ", $text);
                        return $text[1];
                    }
                    else{
                        return '-';
                    }
                }
                
                
            });

            $data["blood"] = $goutte->filter('.col_two_one ul li h4')->each(function($node,$key) use ($data, $data_key, $tmp_data) {
                $text = $node->filter('h4')->text();
                if($text == '-'){
                    return '-';
                }
                
                if (strpos($text, "血液型") !==false ) {
                    $text = explode(" ", $text);
                    if(empty($text[1]) ){
                        return 'O';
                    }else{
                        return $text[1];
                    }
                }
            });


            $data["dob"] = array_filter($data["dob"]);
            $data["dob"] = str_replace('生', '', $data["dob"]);


            $data["gender"] = array_filter($data["gender"]);

            $data["blood"] = array_filter($data["blood"]);
            
            $data["name"] = array_filter($data["name"]);
            $data["ruby"] = array_filter($data["ruby"]);

            
            $dob_data = [];
            $i=0;
            foreach ($data["dob"] as $key => $value) {
                if($value == '-'){
                    $dob_data[$i]['month'] = null;
                    $dob_data[$i]['day'] = null;
                }else{
                    $devided_dob = explode('月',$value);
                    $dob_data[$i]['month'] = $devided_dob[0];
                    $devided_dob_day = explode('日',$devided_dob[1]);
                    $dob_data[$i]['day'] = $devided_dob_day[0];
                }
                $i++;
            }
            $i=0;
            $gender_data = [];
            foreach ($data["gender"] as $key => $value) {
                
                $gender_data[$i] = $value;
                
                $i++;
            }
            $blood_data = [];
            $i=0;
            foreach ($data["blood"] as $key => $value) {
                
                $blood_data[$i] = $value;
                
                $i++;
            }
            
            // それぞれのデータを挿入
            
            for ($i=0; $i < count($data["name"]); $i++) { 
                
                print($data["name"][$i]);
                echo "\n";
                print($data["ruby"][$i]);
                echo "\n";
                print($dob_data[$i]["month"]);
                echo "\n";
                print($dob_data[$i]["day"]);
                echo "\n";
                print($title_str);
                echo "\n";
                print($blood_data[$i]);
                echo "\n";
                print($gender_data[$i]);
                echo "\n";
                
                echo "-----------------";
                echo "\n";

                
                
                Character::updateOrCreate(['name' => $data["name"][$i], 'title'=>$title_str],[
                        'name' => $data["name"][$i],
                        'ruby' => $data["ruby"][$i],
                        'title' => $title_str,
                        'month' => $dob_data[$i]["month"],
                        'day' => $dob_data[$i]["day"],
                        'blood' => $blood_data[$i],
                        'gender' => $gender_data[$i],
                    
                    ]);
                
                
                    
                }
                if($page>6){
                    continue ;
                    
                }
                
                
            }
            
            sleep(1);
       
         
        }
        
        
        
    }
}