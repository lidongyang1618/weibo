<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //  创建用户注册、更新、删除等一些列动作

    public function create()
    {
    	return view('users.create');
    }
}
