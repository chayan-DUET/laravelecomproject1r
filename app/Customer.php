<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable = [
        'customer_name', 'customer_email','mobil_number', 'password',
    ];
}
