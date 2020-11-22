<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    protected $fillable = [ 'id', 'name', 'link','keyword','stand_id'];

    public function stand() {
        return $this->belongsTo('App\Stand');
    }

}
