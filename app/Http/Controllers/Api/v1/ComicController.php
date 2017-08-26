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
}