<?php

namespace App\Http\Controllers;

use Hiver\Admin\Models\Ad;
use Hiver\Admin\Models\Banner;
use Hiver\Admin\Models\Comic;
use PheRum\BBCode\BBCodeParser;

class WebController extends Controller
{
    public function home()
    {
        $perPage = 6;
        $comics = Comic::paginate($perPage);
        $banner = Banner::paginate(5);
        $ads = Ad::all()->first();
        return view('home', ['banner' => $banner, 'comics' => $comics, 'ads' => $ads]);
    }

    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        $bbcode = new BBCodeParser;
        $comic->content = $bbcode->parse($comic->content);
        return view('show', compact('comic'));
    }

    public function comics()
    {
        return view('content.index');
    }
}