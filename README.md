# Loushao
http://www.loushao.net

## 安装项目
1、将`.env.example`文件复制一份修改为`.env`<br>
2、安装项目依赖文件`composer install`

## 初始化数据库
`php artisan migrate`

## 初始化资源文件
1、要求系统需要安装node.js<br>
2、安装依赖文件`npm install`<br>
3、执行编译`glup`<br>
4、生成laravel项目的key<br>
`php artisan key:generate`

## 初始化Hiver/Admin插件
1、进入packages/hiver/admin文件夹下<br>
2、安装依赖文件`npm install`<br>
3、执行编译`glup`<br>
4、返回项目根目录，并发布配置文件<br>
<pre><code>php artisan vendor:publish
php artisan vendor:publish --force</code></pre>

## 安装Hiver/Admin插件
1、在Laravel应用根目录下修改`config/app.php`，将服务提供者追加到providers数组<br>
`Hiver\Admin\AdminServiceProvider::class`<br>
2、更新Composer的autoload<br>
`composer dump-autoload`<br>

## 关于后台自动生成模板
<pre><code>php artisan crud:generate Users --fields_from_file="packages/hiver/admin/template/users.json" --view-path=../../packages/hiver/admin/resources/views/ --controller-namespace=../../../packages/hiver/admin/src/Http/Controllers --route-group=admin --route=no --model-namespace=../packages/hiver/admin/src/Models</code></pre>

<pre><code>php artisan crud:controller RoleController --crud-name=role --view-path=../packages/hiver/admin/resources/views/ --controller-namespace=../packages/hiver/admin/src/Http/Controllers --route-group=admin --model-namespace=../packages/hiver/admin/src/Models --model-name=Role</code></pre>

<pre><code>php artisan crud:view role --fields="name#string; display_name#string; description#string" --view-path=../../packages/hiver/admin/resources/views/ --route-group=admin</code></pre>

## 关于备份数据库操作
<pre><code>php artisan backup:run</code></pre>
### 备份数据库
<pre><code>php artisan backup:run --only-db</code></pre>
### 备份文件
<pre><code>php artisan backup:run --only-files</code></pre>

### 关于评论部分
[actuallymab/laravel-comment](https://github.com/actuallymab/laravel-comment)
需要修改默认表名

### 关于BBCODE部分
vendor中有BUG，需要手动修正，陆续还会支持更多标签，具体见今后的gist文件