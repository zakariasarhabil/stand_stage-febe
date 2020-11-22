<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['id', 'name', 'file','stand_id'];

    public function stand() {
        return $this->belongsTo('App\Stand');
    }
}
