<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
