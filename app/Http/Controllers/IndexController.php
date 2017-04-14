<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Message\News;

use Log;

use App\Test;

class IndexController extends Controller
{
    //
    public function wechat () {
    	Log::info('request arrived.');
    	$wechat = app('wechat');
    	$wechat->server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                case 'event':
                    switch ($message->Event) {
                        case 'subscribe':
                            return "欢迎关注 漂流的木头 的微信公众号";
                            break;
                    }
                    break;
                
                case 'text':
                        switch ($message->Content) {
                            case '简历':
                            // 图文信息
                                $news = new News([
                                        'title'       => '关于我..',
                                        'description' => '我的简历...',
                                        'url'         => 'http://caoyangjie.xyz/resume',
                                        'image'       => 'http://caoyangjie.xyz/public/resume/images/avatar.jpg',
                                        // ...
                                    ]);
                                return $news;
                                break;
                            
                            default:
                                return "你输入的是".$message->Content;
                                break;
                        }
                    break;
            }
        });
        Log::info('return response.');
        return $wechat->server->serve();
    }
    //
    public function resume () {
        return view('resume.index');
    }
    public function testDB () {
        $test = Test::all();
        return $test;
        // $test = Test::find(1)->delete();
    }
}
