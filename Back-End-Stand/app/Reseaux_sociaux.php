<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseaux_sociaux extends Model
{
    public function stand() {
        return $this->belongsTo('App\Stand');
    }
    protected $fillable = [
        'id', 'name', 'link','stand_id'
    ];
}
