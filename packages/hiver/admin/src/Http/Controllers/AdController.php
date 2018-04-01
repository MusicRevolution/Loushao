<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hiver\Admin\Models\Ad;
use Illuminate\Http\Request;
use Session;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ad = Ad::where('title', 'LIKE', "%$keyword%")
				->orWhere('img', 'LIKE', "%$keyword%")
				->orWhere('url', 'LIKE', "%$keyword%")
				->orWhere('hits', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $ad = Ad::paginate($perPage);
        }

        return view('admin::ad.index', compact('ad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $img = '';
        return view('admin::ad.create', compact('img'));
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
			'hits' => 'required|min:0'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('img')) {
            $file = $request['img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['img'] = 'uploads/img/'.date('Y-m-d').'/'.$fileName;
        } else {
            $requestData['img'] = '';
        }

        $requestData['user_id'] = \Auth::id();
        Ad::create($requestData);

        Session::flash('flash_message', '添加成功！');

        return redirect('admin/ad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);

        return view('admin::ad.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $img = '';
        if(!empty($ad->img))
            $img = url($ad->img);
        return view('admin::ad.edit', compact('ad', 'img'));
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
			'hits' => 'required|min:0'
		]);
        $requestData = $request->all();
        
        if ($request->hasFile('img')) {
            $file = $request['img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['img'] = 'uploads/img/'.date('Y-m-d').'/'.$fileName;
        }

        $requestData['user_id'] = \Auth::id();

        $ad = Ad::findOrFail($id);
        $ad->update($requestData);

        Session::flash('flash_message', '更新成功！');

        return redirect('admin/ad');
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
        Ad::destroy($id);

        Session::flash('flash_message', '删除成功！');

        return redirect('admin/ad');
    }
}