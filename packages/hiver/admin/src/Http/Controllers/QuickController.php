<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Hiver\Admin\Models\Download;
use Illuminate\Http\Request;
use Hiver\Admin\Models\Comic;
use Session;

class QuickController extends Controller
{
    /**
     * 快速发布资源
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comic()
    {
        $small_img = '';
        $big_img = '';
        return view('admin::quick.comic', compact('small_img', 'big_img'));
    }

    /**
     * 保存动漫资源
     * @param Request $request
     */
    public function saveComic(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'small_img' => 'required',
            // 'big_img' => 'required',
            'score' => 'required|min:0',
            'hits' => 'required|min:0',
            'comment' => 'required|min:0',
            'topic' => 'required|min:0'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('small_img')) {
            $file = $request['small_img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'small_'.date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['small_img'] =  'uploads/img/'.date('Y-m-d').'/'.$fileName;
        } else {
            $requestData['small_img'] = '';
        }

        if ($request->hasFile('big_img')) {
            $file = $request['big_img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'big_'.date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['big_img'] =  'uploads/img/'.date('Y-m-d').'/'.$fileName;
        } else {
            $requestData['big_img'] = '';
        }
        $requestData['user_id'] = \Auth::id();
        $download_content = $request->download_list;
        $comic = Comic::create($requestData);

        if(!empty($download_content))
        {
            // 添加下载资源
            $dowloads = explode("\r\n", $download_content);
            foreach ($dowloads as $d) {
                if(!empty($d) && strlen($d) > 20) {
                    $result = $this->request_get("https://loushaomaster.chinacloudsites.cn/file/metadata/".$d);
                    if($result['exist']) {
                        $download = new Download();
                        $download->title = $result['name'];
                        $download->url = $d;
                        $download->filesize = $result['size'];
                        $download->download = 0;
                        $download->comic_id = $comic->id;
                        $download->user_id = \Auth::id();
                        $download->save();
                    }
                }
            }
        }

        Session::flash('flash_message', '添加成功！');

        return redirect('admin/quick/comic');
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
        $result = curl_exec($ch);
        curl_close($ch);
        return $arr = json_decode($result,true);
    }
}