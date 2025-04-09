<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders_products extends Model
{
	protected $table = 'orders_products';
	public $primaryKey = 'orders_products_id';
   
	protected $fillable = [
        'order_products_product_id',
        'user_id',
        'order_products_name',
        'order_products_price',
        'orders_id',
        'order_products_qty',
        'mat_language',
        'shipping',
        'order_products_subtotal',
        't_variation_price',
        'variants'
    ];
} 