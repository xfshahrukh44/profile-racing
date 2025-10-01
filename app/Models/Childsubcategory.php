<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Childsubcategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'childsubcategories';

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
    protected $fillable = ['subcategory', 'childsubcategory'];

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function childsubcategories()
    {
        return $this->hasMany(Childsubcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
