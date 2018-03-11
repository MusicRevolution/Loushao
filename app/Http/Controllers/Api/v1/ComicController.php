<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1;
use Hiver\Admin\Models\Download;
use Hiver\Admin\Models\Comic;

class ComicController extends Controller
{
    public function getDownloadByID($id)
    {
        return Download::find($id);
    }

    public function getComics()
    {
        $perPage = 6;
        return Comic::paginate($perPage);
    }
}