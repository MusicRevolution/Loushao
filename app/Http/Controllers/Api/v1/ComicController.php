<?php

namespace App\Http\Controllers\Api\v1;

use Hiver\Admin\Models\Download;
use Hiver\Admin\Models\Comic;
use Illuminate\Support\Facades\Input;

class ComicController extends Controller
{
    /**
     * 获得下载资源
     *
     * @param $id
     * @return mixed
     */
    public function getDownloadByID($id)
    {
        return Download::find($id);
    }

    /**
     * 获得动画列表
     *
     * @return mixed
     */
    public function getComics()
    {
        $perPage = 6;
        return Comic::orderBy('updated_at', 'desc')->paginate($perPage);
    }

    /**
     * 点击率
     *
     * @param $id
     */
    public function hits($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->hits = $comic->hits + 1;
        $comic->save();
    }

    /**
     * 上传动漫图片
     *
     * @return string
     */
    public function updateImage()
    {
        $n_file = Input::file("file");
        if($n_file->isValid()) {
            //获取文件名称
            $clientName = $n_file->getClientOriginalName();
            $realPath = $n_file->getRealPath();
            //获取图片格式
            $entension = $n_file->getClientOriginalExtension();
            if(!in_array(strtolower($entension), array('png', 'jpeg', 'jpg'))) {
                $data['result'] = false;
                $data['msg'] = '图片格式不正确（png,jpeg,jpg）';
                return json_encode($data);
            }
            //图片保存路径
            $mimeTye = $n_file->getMimeType();
            $fileName = 'api_'.date('Ymdhis').'.'.$entension;
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $path = $n_file->move($uploadPath, $fileName);
            if ($path) {
                $data['code'] = true;
                $data['msg'] = '上传成功';
                $data['data'] = 'uploads/img/'.date('Y-m-d').'/'.$fileName;
                return json_encode($data);
            } else {
                $data['code'] = false;
                $data['msg'] = '上传失败';
                return json_encode($data);
            }
        }
    }
}