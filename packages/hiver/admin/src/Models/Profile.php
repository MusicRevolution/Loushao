<?php

namespace Hiver\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

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
    protected $fillable = ['avatar', 'status', 'follows', 'logins', 'times', 'fans', 'user_id'];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
	
}
