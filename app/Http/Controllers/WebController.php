<?php

namespace App\Http\Controllers;

use App\User;
use Hiver\Admin\Models\Ad;
use Hiver\Admin\Models\Banner;
use Hiver\Admin\Models\Comic;
use Hiver\Admin\Models\Download;
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
        $comic->hits = $comic->hits + 1;
        $comic->save();
        $bbcode = new BBCodeParser;
        $comic->content = $bbcode->parse($comic->content);
        $downloads = Download::whereRaw('comic_id = ?', [$id])->get();
        $ads = Ad::all()->first();
        return view('show', ['comic' => $comic, 'downloads' => $downloads, 'ads' => $ads]);
    }

    public function comics()
    {
        return view('content.index');
    }
}