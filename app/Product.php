<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'material',
        'status',
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->hasManyThrough(Order::class, ViProductOrder::class);
    }
}
