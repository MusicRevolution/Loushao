# Loushao
http://www.loushao.net

## 安装项目
1、将`.env.example`文件复制一份修改为`.env`
2、安装项目依赖文件`composer install`

## 初始化数据库
`php artisan migrate`

## 初始化资源文件
1、要求系统需要安装node.js
2、安装依赖文件`npm install`
3、执行编译`glup`
4、生成laravel项目的key

`php artisan key:generate`

## 初始化Hiver/Admin插件
1、进入packages/hiver/admin文件夹下
2、安装依赖文件`npm install`
3、执行编译`glup`
4、返回项目根目录，并发布配置文件

``php artisan vendor:publish
php artisan vendor:publish --force``

## 安装Hiver/Admin插件
1、在Laravel应用根目录下修改`config/app.php`，将服务提供者追加到providers数组

`Hiver\Admin\AdminServiceProvider::class`

2、更新Composer的autoload

`composer dump-autoload`