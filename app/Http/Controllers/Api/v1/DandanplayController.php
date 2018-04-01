<?php

namespace App\Http\Controllers\Api\v1;

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
        return $arr = json_decode($result,true);
    }
}