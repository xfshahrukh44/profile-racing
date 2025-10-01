<?php

namespace App;
use Illuminate\Support\Facades\DB;
use App\ProductAttribute;
use App\Models\Childsubcategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['product_title', 'description', 'price'];

    public function categorys()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function attributes()
    {
        // return $this->hasMany('App\ProductAttribute', 'product_id', 'id');
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id')->with(['attribute', 'attributeValue']);
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class, 'category'); // Ensure 'category' column in products table
    }

    public function childsubcategories()
    {
        return $this->hasMany(Childsubcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category', 'id');
    }

    public function getPriceWithIncrementAttribute()
    {
        $category = DB::table('categories')->where('id', $this->category)->first();
        $increment = $category->price_increment ?? 0;
        return $this->price + ($this->price * $increment / 100);
    }
}
