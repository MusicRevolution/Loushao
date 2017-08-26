<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hiver\Admin\Models\Feedback;
use Illuminate\Http\Request;
use Session;

class FeedbackController extends Controller
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
            $feedback = Feedback::where('name', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('feedback', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $feedback = Feedback::paginate($perPage);
        }

        return view('admin::feedback.index', compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::feedback.create');
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
			'name' => 'required|max:20',
			'email' => 'required|max:255',
			'feedback' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        Feedback::create($requestData);

        Session::flash('flash_message', '添加成功！');

        return redirect('admin/feedback');
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
        $feedback = Feedback::findOrFail($id);

        return view('admin::feedback.show', compact('feedback'));
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
        $feedback = Feedback::findOrFail($id);

        return view('admin::feedback.edit', compact('feedback'));
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
			'name' => 'required|max:20',
			'email' => 'required|max:255',
			'feedback' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        $feedback = Feedback::findOrFail($id);
        $feedback->update($requestData);

        Session::flash('flash_message', '更新成功！');

        return redirect('admin/feedback');
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
        Feedback::destroy($id);

        Session::flash('flash_message', '删除成功！');

        return redirect('admin/feedback');
    }
}
