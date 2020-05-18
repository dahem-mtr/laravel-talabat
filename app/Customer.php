<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    protected $fillable = [
        'phone_no',
        'name',
        'api_token',
    ];


    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
