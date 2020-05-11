<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
    ];
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
    
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }
    
    public function hasImage()
    {    
        return $this->image()->count();
       
    }
}
