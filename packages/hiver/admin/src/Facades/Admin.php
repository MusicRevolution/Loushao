<?php

/*
 * Hiver后台
 *
 * (c) Hiver.cc <delicacylee@vip.sina.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiver\Admin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 自定义门面
 *
 * @author Yazhi Li <delicacylee@vip.sina.com>
 */
class Admin extends Facade
{
    /**
     * 获得注册的组件名称
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'admin';
    }
}