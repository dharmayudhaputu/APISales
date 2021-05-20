<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales_order extends Model
{
    protected $fillable = ['order_number', 'customer', 'quantity_sales_order', 'tax_sales_order', 'total_price', 'sales_person'];
}