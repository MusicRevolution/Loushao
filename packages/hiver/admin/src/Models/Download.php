<?php

namespace Hiver\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'downloads';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'url', 'filesize', 'download', 'comic_id', 'user_id'];

    
}
