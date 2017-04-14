<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;

use Auth;

use App\User;

class LoginController extends Controller
{
	public function login(Request $request)
	{
		$input = $request->input();
		$email = $input['email'];
		$password = $input['password'];
		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			return response()->json(['errCode'=>0,	'msg'=>'登录成功']);
		}
		return response()->json(['errCode'=>110, 'msg'=>'账号密码错误']);

	}
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}