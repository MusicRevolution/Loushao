# Loushao
http://www.loushao.net

## 安装Hiver/Admin插件
1、在Laravel应用根目录下修改config/app.php，将服务提供者追加到providers数组
Hiver\Admin\AdminServiceProvider::class

2、更新Composer的autoload
composer dump-autoload

3、发布配置文件
php artisan vendor:publish
php artisan vendor:publish --force

## 初始化数据库
php artisan migrate