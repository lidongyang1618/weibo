<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //  创建用户注册、更新、删除等一些列动作

    public function create()
    {
    	return view('users.create');
    }

    public function show(User $user)
    {
    	return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        // 注册信息验证。
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);


        // 注册信息存储。
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);


        // 用户注册成功后自动登录。
        Auth::login($user);

        // 注册成功提示信息。
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程！');


        // 将页面重定向到用户个人信息页。
        return redirect()->route('users.show', [$user]);
    }
}
