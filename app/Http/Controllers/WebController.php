<?php

namespace App\Http\Controllers;

class WebController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function comics()
    {
        return view('content.index');
    }
}