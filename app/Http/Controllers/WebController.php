<?php

namespace App\Http\Controllers;

use Hiver\Admin\Models\Banner;
use Hiver\Admin\Models\Comic;

class WebController extends Controller
{
    public function home()
    {
        $perPage = 6;
        $comics = Comic::paginate($perPage);
        $banner = Banner::paginate(5);
        return view('home', compact('banner'), compact('comics'));
    }

    public function comics()
    {
        return view('content.index');
    }
}