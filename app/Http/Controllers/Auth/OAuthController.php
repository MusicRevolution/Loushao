<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Overtrue\Socialite\SocialiteManager;

class OAuthController extends Controller
{
    private $config = [
        'github' => [
            'client_id'     => 'your-app-id',
            'client_secret' => 'your-app-secret',
            'redirect'      => 'http://localhost/socialite/callback.php',
        ],
        'weibo' => [
            'client_id'     => 'your-app-id',
            'client_secret' => 'your-app-secret',
            'redirect'      => 'http://localhost/socialite/callback.php',
        ],
        'wechat_open' => [
            'client_id'     => 'your-app-id',
            'client_secret' => 'your-app-secret',
            'redirect'      => 'http://localhost/socialite/callback.php',
        ],
        'qq' => [
            'client_id'     => 'your-app-id',
            'client_secret' => 'your-app-secret',
            'redirect'      => 'http://localhost/socialite/callback.php',
        ],
    ];

    private $socialite;

    public function __construct()
    {
        $this->socialite = new SocialiteManager($this->config);
    }

    public function index($name)
    {
        $response = $this->socialite->driver($name)->redirect();
        echo $response;
    }

    public function callback($name)
    {
        $user = $this->socialite->driver($name)->user();
        return $user;
    }
}