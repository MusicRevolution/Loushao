<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hiver\Admin\Models\Comic;
use Illuminate\Http\Request;
use Session;

class ComicsController extends Controller
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
            $comics = Comic::where('title', 'LIKE', "%$keyword%")
				->orWhere('small_img', 'LIKE', "%$keyword%")
				->orWhere('big_img', 'LIKE', "%$keyword%")
				->orWhere('score', 'LIKE', "%$keyword%")
				->orWhere('hits', 'LIKE', "%$keyword%")
				->orWhere('content', 'LIKE', "%$keyword%")
				->orWhere('comment', 'LIKE', "%$keyword%")
				->orWhere('topic', 'LIKE', "%$keyword%")
				->orWhere('tags', 'LIKE', "%$keyword%")
				->orWhere('country', 'LIKE', "%$keyword%")
				->orWhere('source', 'LIKE', "%$keyword%")
				->orWhere('barcode', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $comics = Comic::paginate($perPage);
        }

        return view('admin::comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::comics.create');
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
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['small_img'] = $fileName;
        } else {
            $requestData['small_img'] = '';
        }

        if ($request->hasFile('big_img')) {
            $file = $request['big_img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['big_img'] = $fileName;
        } else {
            $requestData['big_img'] = '';
        }

        $requestData['user_id'] = \Auth::id();

        Comic::create($requestData);

        Session::flash('flash_message', '添加成功！');

        return redirect('admin/comics');
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
        $comic = Comic::findOrFail($id);

        return view('admin::comics.show', compact('comic'));
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
        $comic = Comic::findOrFail($id);

        return view('admin::comics.edit', compact('comic'));
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
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['small_img'] = $fileName;
        } else {
            $requestData['small_img'] = '';
        }

        if ($request->hasFile('big_img')) {
            $file = $request['big_img'];
            $uploadPath = public_path('/uploads/img/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['big_img'] = $fileName;
        } else {
            $requestData['big_img'] = '';
        }

        $requestData['user_id'] = \Auth::id();

        $comic = Comic::findOrFail($id);
        $comic->update($requestData);

        Session::flash('flash_message', '更新成功！');

        return redirect('admin/comics');
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
        Comic::destroy($id);

        Session::flash('flash_message', '删除成功！');

        return redirect('admin/comics');
    }
}
