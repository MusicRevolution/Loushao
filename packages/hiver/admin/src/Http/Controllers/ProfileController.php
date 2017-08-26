<?php

namespace Hiver\Admin\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hiver\Admin\Models\Profile;
use Illuminate\Http\Request;
use Session;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $profile = Profile::where('user_id', '=', $id)->firstOrFail();

        return view('admin::profile.edit', compact('profile'));
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
        
        $requestData = $request->all();

        if ($request->hasFile('avatar')) {
            $file = $request['avatar'];
            $uploadPath = public_path('/uploads/avatar/').date('Y-m-d');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis').'.'.$extension;
            $file->move($uploadPath, $fileName);
            $requestData['avatar'] = $fileName;
        } else {
            $requestData['avatar'] = '';
        }
        
        $profile = Profile::findOrFail($id);
        $profile->update($requestData);

        Session::flash('flash_message', '更新成功！');

        return redirect('admin/users');
    }
}
