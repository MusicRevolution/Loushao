<?php

/*
 * Hiver后台
 *
 * (c) Hiver.cc <delicacylee@vip.sina.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiver\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Foundation\AliasLoader;
use Hiver\Admin\Facades\Admin as AdminFacade;

/**
 * Admin服务提供程序
 *
 * @author Yazhi Li <delicacylee@vip.sina.com>
 */
class AdminServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * 注册应用服务
     */
    public function register()
    {
        // 注册门面类
        $loader = AliasLoader::getInstance();
        $loader->alias('Admin', AdminFacade::class);

        // 单例模型
        $this->app->singleton('admin', function () {
            return new Admin();
        });

        // 注册帮助类
        $this->loadHelpers();

        // 注册视图
        $this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'admin');
        // 注册路由器
        $this->setupRoutes($this->app->router);
        // 注册发布资源
        $this->registerPublishableResources();
    }

    /**
     * 自定义路由
     *
     * @param \Illuminate\Routing\Router $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Hiver\Admin\Http\Controllers'], function($router)
        {
            require __DIR__.'/../routes/admin.php';
        });
    }

    /**
     * 加载辅助函数
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * 注册发布资源
     */
    private function registerPublishableResources()
    {
        $publishablePath = dirname(__DIR__).'/publishable';
        $publishable = [
            'admin_assets' => [
                "{$publishablePath}/assets/" => public_path(config('admin.assets_path')),
            ],
            'migrations' => [
                "{$publishablePath}/database/migrations/" => database_path('migrations'),
            ],
            'seeds' => [
                "{$publishablePath}/database/seeds/" => database_path('seeds'),
            ],
            'config' => [
                "{$publishablePath}/config/admin.php" => config_path('admin.php'),
            ],
            'lang' => [
                "{$publishablePath}/lang/" => base_path('resources/lang/'),
            ],
        ];
        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }
}