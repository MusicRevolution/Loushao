<?php

namespace Hiver\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

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
    protected $fillable = ['score', 'content', 'source', 'tops', 'downs', 'isadmin', 'comment_id', 'user_id'];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
	
}
