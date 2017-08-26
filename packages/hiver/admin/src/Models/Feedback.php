<?php

namespace Hiver\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feedbacks';

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
    protected $fillable = ['name', 'email', 'feedback'];

    
}
