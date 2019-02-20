<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    // 为控制器加上home(),help(),about()这三个动作来处理从路由发过来的请求

    public function home()
    {
        return view('static_pages/home');
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
    	return view('static_pages/about');
    }

}
