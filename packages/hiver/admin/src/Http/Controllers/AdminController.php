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
use anlutro\LaravelSettings\Facade as Setting;
use Mews\Captcha\Facades\Captcha;
use Session;

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
        return view('admin::index');
    }

    public function welcome()
    {
        //dd(Config::get("admin.message"));
        return view('admin::welcome');
    }

    public function setting()
    {
        return view('admin::setting');
    }

    public function getCaptcha()
    {
        return Captcha::src();
    }

    public function update(Request $request)
    {
        $title = $request->get('title');
        $welcome = $request->get('welcome');
        $keywords = $request->get('keywords');
        $description = $request->get('description');
        $icp = $request->get('icp');
        $copyright = $request->get('copyright');
        $tongji = $request->get('tongji');
        $dandanplay = $request->get('dandanplay');
        $download = $request->get('download');
        Setting::set('setting.title', $title);
        Setting::set('setting.welcome', $welcome);
        Setting::set('setting.keywords', $keywords);
        Setting::set('setting.description', $description);
        Setting::set('setting.icp', $icp);
        Setting::set('setting.copyright', $copyright);
        Setting::set('setting.tongji', $tongji);
        Setting::set('setting.dandanplay', $dandanplay);
        Setting::set('setting.download', $download);
        Setting::save();

        Session::flash('flash_message', '保存成功！');

        return redirect('admin/setting');
    }

    public function dandanplay()
    {
        return view('admin::dandanplay');
    }

    public function updateDDP(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $appid = $request->get('appid');
        $appsecret = $request->get('appsecret');
        $auth = $request->get('auth');
        Setting::set('dandanplay.username', $username);
        Setting::set('dandanplay.password', $password);
        Setting::set('dandanplay.appid', $appid);
        Setting::set('dandanplay.appsecret', $appsecret);
        Setting::set('dandanplay.auth', $auth);
        Setting::save();

        Session::flash('flash_message', '保存成功！');

        return redirect('admin/dandanplay');
    }
}