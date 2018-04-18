<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'colors',
        'name',
        'dark'
    ];

    public function getColorsAttribute()
    {
        return json_decode($this->colors);
    }
}
