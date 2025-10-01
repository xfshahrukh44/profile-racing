<?php

namespace App\Models;
use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subcategories';

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
    protected $fillable = ['category', 'subcategory', 'image'];

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
