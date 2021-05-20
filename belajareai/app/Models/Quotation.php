<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['product_quotation', 'quantity_quotation', 'unit_price_quotation', 'total_quotation'];
}