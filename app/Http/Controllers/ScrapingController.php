<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class ScrapingController extends Controller
{
    //
    public function index() {

        $goutte = GoutteFacade::request('GET','https://bd.fan-web.jp/sayhappy_sp.cgi?month=1&day=1');
        $texts = array();
        
        $goutte->filter('div center form .wrapper h6 font.ajax-iine')->each(function ($node) use (&$texts) {
            dump($node);
            $texts[] = $node->text();
        });

        $params = [
            'texts' => $texts
        ];

        dd($params);
        sleep(4);
        
    }
}
