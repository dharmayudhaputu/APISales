<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name_product', 'type_product', 'stock_product', 'unit_price_product', 'image_product'];
}