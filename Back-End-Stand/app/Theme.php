<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'id', 'name', 'path'
    ];

    public function stand() {
        return $this->hasMany('App\stand');
    }
}
