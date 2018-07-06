<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'mobile',
        'city',
        'district',
        'address',
        'email_verify',
        'mobile_verify',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'created_at'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setNameAttribute($value)
    {
        if ($value == null) {
            $value = '123';
        }
        $this->attributes['name'] = $value;
    }
}
