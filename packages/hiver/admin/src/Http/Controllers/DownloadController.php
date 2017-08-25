<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hiver\Admin\Models\Download;
use Illuminate\Http\Request;
use Session;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $id = $request->get('id');
        if($id < 1)
            return redirect('admin/comics');

        $perPage = 25;

        if (!empty($keyword)) {
            $download = Download::where('title', 'LIKE', "%$keyword%")
				->orWhere('url', 'LIKE', "%$keyword%")
				->orWhere('filesize', 'LIKE', "%$keyword%")
				->orWhere('download', 'LIKE', "%$keyword%")
				->andWhere('comic_id', '=', $id)
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $download = Download::where('comic_id', '=', $id)->paginate($perPage);
        }

        return view('admin::download.index', compact('download'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required|max:255',
			'url' => 'required|max:255',
			'filesize' => 'required|min:0',
			'download' => 'required|min:0'
		]);
        $requestData = $request->all();

        $requestData['user_id'] = \Auth::id();
        
        Download::create($requestData);

        Session::flash('flash_message', '添加成功！');

        return redirect('admin/download/index?id='.$requestData['comic_id']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'title' => 'required|max:255',
			'url' => 'required|max:255',
			'filesize' => 'required|min:0',
			'download' => 'required|min:0'
		]);
        $requestData = $request->all();

        $requestData['user_id'] = \Auth::id();
        
        $download = Download::findOrFail($id);
        $download->update($requestData);

        Session::flash('flash_message', '更新成功！');

        return redirect('admin/download/index?id='.$requestData['comic_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $download = Download::findOrFail($id);
        $comic_id = $download['comic_id'];
        Download::destroy($id);

        Session::flash('flash_message', '删除成功！');

        return redirect('admin/download/index?id='.$comic_id);
    }
}