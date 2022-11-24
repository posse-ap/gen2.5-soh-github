<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
    body {font-size: 16pt; color:#999;}
    h1 {font-size:100pt; text-align:right; color:#eee; margin: -40px 0px -50px 0px;}
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt){
    return "<{$tag}>".$txt."</{$tag}>";
}

class HelloController extends Controller
{
    // public function index(Request $request, Response $response) {
    //     global $head, $style, $body, $end;
    //     $html = $head . tag('title','Hello/Index') . $style . 
    //         $body
    //         . tag('h1', 'Index') . tag('h3', 'Request') . '<pre>'. $request .'</pre>' . tag('h3', 'Response') . '<pre>'. $response .'</pre>'
    //         . $end;
    //     $response->setContent($html);
    //     return $response;
    // }
    public function index() {
        return view('hello.index', ['msg'=>'']);
    }

    public function post(Request $request){
        return view('hello.index', ['msg' => $request->msg]);
    }
}
