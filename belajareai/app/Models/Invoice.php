<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['product_invoice', 'quantity_invoice', 'payment_method', 'tax_invoice', 'amount_invoice'];
}