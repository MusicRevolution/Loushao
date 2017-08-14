<?php

/*
 * Hiver后台
 *
 * (c) Hiver.cc <delicacylee@vip.sina.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiver\Admin\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hiver\Admin\Facades\Admin;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        return view('admin::login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required',
            'password' => 'required',
            'validCode' => 'required|captcha'
        ], [
            'email.required' => '邮箱必须',
            'password.required' => '密码必须',
            'validCode.captcha' => '验证码错误',
            'validCode.required' => '验证码必须',
        ]);
        
        if (\Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->has('remember'))) {
            return redirect()->intended('/admin');
        }
        return redirect()->to("/admin/login");
    }
}