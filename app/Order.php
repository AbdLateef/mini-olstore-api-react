<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'customer_email',
        'customer_name',
        'customer_address',
        'status'
    ];

}
