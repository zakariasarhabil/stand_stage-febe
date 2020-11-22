<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = ['id', 'name', 'description'];

    public function espaceExposition() {
        return $this->hasMany('App\Espace_exposition');
    }
}
