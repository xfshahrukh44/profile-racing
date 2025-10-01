<?php

namespace App;

use App\ProductAttribute;
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
    protected $fillable = ['product_title', 'description', 'price', 'type'];

    public function categorys()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function attributes()
    {
        // return $this->hasMany('App\ProductAttribute', 'product_id', 'id');
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id')->with(['attribute', 'attributeValue']);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'bundle_items', 'product_id', 'bundle_id')->withPivot('quantity');
    }

    public function bundles()
    {
        return $this->belongsToMany(Product::class, 'bundle_items', 'product_id', 'bundle_id')
            ->withPivot('quantity');
    }

    public function scopeBundles($query)
    {
        return $query->where('type', 'bundle');
    }

    public function scopeSimple($query)
    {
        return $query->where('type', 'simple');
    }

}
