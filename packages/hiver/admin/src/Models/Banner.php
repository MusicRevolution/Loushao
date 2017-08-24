<?php

namespace Hiver\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banners';

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
    protected $fillable = ['title', 'img', 'url', 'hits', 'status', 'user_id'];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
	
}
