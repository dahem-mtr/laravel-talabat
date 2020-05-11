<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function menus()
    {
        return $this->hasMany('App\Menu');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
