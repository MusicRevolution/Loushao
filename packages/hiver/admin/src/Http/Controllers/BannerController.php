<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hiver\Admin\Models\Banner;
use Illuminate\Http\Request;
use Session;

class BannerController extends Controller
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
            $banner = Banner::where('title', 'LIKE', "%$keyword%")
				->orWhere('img', 'LIKE', "%$keyword%")
				->orWhere('url', 'LIKE', "%$keyword%")
				->orWhere('hits', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $banner = Banner::paginate($perPage);
        }

        return view('admin::banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::banner.create');
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
			'img' => 'required|max:255',
			'url' => 'required',
			'hits' => 'required|min:0'
		]);
        $requestData = $request->all();
        
        if ($request->hasFile('img')) {
            $file = $request['img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['img'] = $fileName;
        } else {
            $requestData['img'] = '';
        }

        $requestData['user_id'] = \Auth::id();

        Banner::create($requestData);

        Session::flash('flash_message', 'Banner added!');

        return redirect('admin/banner');
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
        $banner = Banner::findOrFail($id);

        return view('admin::banner.show', compact('banner'));
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
        $banner = Banner::findOrFail($id);

        return view('admin::banner.edit', compact('banner'));
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
			'img' => 'required',
			'url' => 'required|max:255',
			'hits' => 'required|min:0'
		]);
        $requestData = $request->all();
        
        if ($request->hasFile('img')) {
            $file = $request['img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['img'] = $fileName;
        } else {
            $requestData['img'] = '';
        }

        $requestData['user_id'] = \Auth::id();

        $banner = Banner::findOrFail($id);
        $banner->update($requestData);

        Session::flash('flash_message', 'Banner updated!');

        return redirect('admin/banner');
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
        Banner::destroy($id);

        Session::flash('flash_message', 'Banner deleted!');

        return redirect('admin/banner');
    }
}