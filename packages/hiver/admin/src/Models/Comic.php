<?php

namespace Hiver\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comics';

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
    protected $fillable = ['title', 'small_img', 'big_img', 'score', 'hits', 'intro', 'content', 'comment', 'topic', 'tags', 'country', 'source', 'barcode', 'user_id'];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
	
}
