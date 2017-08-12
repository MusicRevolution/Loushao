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

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

/**
 * 后台控制器
 *
 * @author Yazhi Li <delicacylee@vip.sina.com>
 */
class AdminController extends Controller
{
    /**
     * 后台首页
     *
     * @return Response
     */
    public function index()
    {
        //dd(Config::get("admin.message"));
        return view('admin::index');
    }

    /**
     * 登录页面
     *
     * @return Response
     */
    public function login()
    {
        return view('admin::login');
    }

    public function loginValidate(Request $request)
    {
        $rules = ['validCode' => 'required|captcha'];
        $validator = $this->validate($request, $rules);
        return redirect()->to("/admin");
    }
}