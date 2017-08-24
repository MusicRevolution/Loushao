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
        return view('admin::ad.create');
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
			'url' => 'required|max:255',
			'hits' => 'required|min:0'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('img')) {
            foreach($request['img'] as $file){
                $uploadPath = public_path('/uploads/img');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['img'] = $fileName;
            }
        }

        Ad::create($requestData);

        Session::flash('flash_message', 'Ad added!');

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

        return view('admin::ad.edit', compact('ad'));
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
			'img' => 'required|max:255',
			'url' => 'required|max:255',
			'hits' => 'required|min:0'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('img')) {
            foreach($request['img'] as $file){
                $uploadPath = public_path('/uploads/img');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['img'] = $fileName;
            }
        }

        $ad = Ad::findOrFail($id);
        $ad->update($requestData);

        Session::flash('flash_message', 'Ad updated!');

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

        Session::flash('flash_message', 'Ad deleted!');

        return redirect('admin/ad');
    }
}
