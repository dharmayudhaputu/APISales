<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unpopular_product extends Model
{
    protected $fillable = ['name_unpopular_product', 'quantity_unpopular_product', 'price_unpopular_product', 'product_type_unpopular_product', 'image_unpopular_product'];
}