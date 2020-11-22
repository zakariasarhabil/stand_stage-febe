<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lien_extern extends Model
{
    protected $fillable = ['id', 'name', 'link','stand_id'];

    public function stand() {
        return $this->belongsTo('App\Stand');
    }
}
