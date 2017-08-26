<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Hiver\Admin\Models\User;
use App\User;
use Hiver\Admin\Models\Role;
use Hiver\Admin\Models\Profile;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
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
            $users = User::where('name', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $users = User::where('id', '>', 1)->paginate($perPage);
        }

        return view('admin::users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
        $user = null;
        return view('admin::users.create', compact('roles', 'user'));
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
			'name' => 'required|max:10'
		]);
        $requestData = $request->all();
        
        $user = User::create($requestData);
        $profile = array(
            'avatar' => '',
            'status' => 1,
            'follows' => 0,
            'logins' => 0,
            'times' => 0,
            'fans' => 0,
            'user_id' => $user->id
        );
        Profile::create($profile);
        $roles = $request->get('roles');
        if(!empty($roles))
        {
            foreach ($roles as $role)
                $user->attachRole($role);
        }

        Session::flash('flash_message', '添加成功！');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);
        return view('admin::users.show', compact('user'));
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin::users.edit', compact('user', 'roles'));
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
			'name' => 'required|max:10'
		]);
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        $roles = $request->get('roles');
        if(!empty($roles))
        {
            $user->detachRoles(false);
            foreach ($roles as $role)
                $user->attachRole($role);
        }
        else
        {
            $user->detachRoles(false);
        }

        Session::flash('flash_message', '更新成功！');

        return redirect('admin/users');
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
        User::destroy($id);

        Session::flash('flash_message', '删除成功！');

        return redirect('admin/users');
    }
}
