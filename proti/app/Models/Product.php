<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_brand',
        'product_size',
        'product_color',
        'product_price',
        'product_discount',
        'product_quantity',
        'product_description',
        'product_image',
        'product_galary',
        'product_category',
        'product_buy',
    ];
}
