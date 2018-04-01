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
            'big_img' => 'required',
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
        $requestData['anidbid'] = 0;

        $download_content = $request->download_list;

        $comic = Comic::create($requestData);

        if(!empty($download_content))
        {
            // 添加下载资源
            $dowloads = explode("\r\n", $download_content);
            foreach ($dowloads as $d) {
                if(!empty($d) && strlen($d) > 20) {
                    $download = new Download();
                    $download->title = $d;
                    $download->url = $d;
                    $download->filesize = 0;
                    $download->download = 0;
                    $download->comic_id = $comic->id;
                    $download->user_id = \Auth::id();
                    $download->save();
                }
            }
        }

        Session::flash('flash_message', '添加成功！');

        return redirect('admin/quick/comic');
    }
}