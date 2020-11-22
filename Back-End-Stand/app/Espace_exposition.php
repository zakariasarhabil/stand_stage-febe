<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espace_exposition extends Model
{
    
    protected $fillable = ['id', 'name','evenement_id'];

    public function evenement() {
        return $this->belongsTo('App\Evenement');
    }
    public function stand() {
        return $this->hasMany('App\stand');
    }

}
