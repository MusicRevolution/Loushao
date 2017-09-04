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

    public function update(Request $request)
    {
        $title = $request->get('title');
        $welcome = $request->get('welcome');
        Setting::set('setting.title', $title);
        setting::set('setting.welcome', $welcome);
        Setting::save();

        Session::flash('flash_message', '保存成功！');

        return redirect('admin/setting');
    }
}