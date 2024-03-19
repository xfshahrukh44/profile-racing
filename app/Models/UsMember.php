<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'us_members';

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
    protected $fillable = ['name', 'image', 'facebook', 'twitter', 'instagram'];

    
}
