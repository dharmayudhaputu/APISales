<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name_customer', 'email_customer', 'address_customer', 'no_hp_customer', 'payment_method_customer'];
}