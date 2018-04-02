<?php

namespace App\Http\Controllers\Api\v1;

use anlutro\LaravelSettings\Facade as Setting;
use Illuminate\Http\Request;

class DandanplayController extends Controller
{
    /**
     * 登录
     * @param $username
     * @param $password
     * @param $appid
     */
    public function login($username, $password, $appid, $appsecret)
    {
        $data = time();
        $url = "https://api.acplay.net/api/v2/login";
        $post_data['userName'] = $username;
        $post_data['password'] = $password;
        $post_data['appId'] = $appid;
        $post_data['unixTimestamp'] = $data;
        $post_data['hash'] = md5($appid.$password.$data.$username.$appsecret);
        $res = $this->request_post($url, $post_data);
        return $res;
    }

    /**
     * 获取资源列表
     *
     * @param string $key
     */
    public function request_list(Request $request)
    {
        $requestData = $request->all();
        $result = $this->request_get("https://api.acplay.net/api/v2/search/anime?keyword=".$requestData['q']);
        $list = [];
        foreach ($result['animes'] as $r)
        {
            $array['id'] = $r['animeId'];
            $array['title'] = $r['animeTitle'];
            $array['img'] = $r['imageUrl'];
            $list[] = $array;
        }
        return $list;
    }

    /**
     * Post请求
     *
     * @param string $url
     * @param string $param
     * @return bool|mixed
     */
    private function request_post($url = '', $param = '') {
        if (empty($url) || empty($param)) {
            return false;
        }
        $data_string = json_encode($param);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        curl_close($ch);
        return $arr = json_decode($result,true);
    }

    /**
     * Get请求
     *
     * @param string $url
     * @return bool|mixed
     */
    private function request_get($url = '') {
        if (empty($url)) {
            return false;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.Setting::get('dandanplay.auth', '')
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return $arr = json_decode($result,true);
    }
}