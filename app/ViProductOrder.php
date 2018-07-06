<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViProductOrder extends Model
{
    protected $fillable = ['order_id', 'product_id'];
}
