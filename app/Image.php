<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'path', 'type',
    ];
    public function imageable()
    {
        return $this->morphTo();
    }
}
