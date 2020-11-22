<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $fillable = [
        'id', 'name'
    ];


    public function stand() {
        return $this->hasMany('App\stand');
    }
}
