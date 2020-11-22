<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    
    protected $fillable = [ 'id', 'description', 'name','theme_id','statu_id', 'espace_exposition_id'];

    public function theme() {
        return $this->belongsTo('App\theme');
    }

    public function reseau() {
        return $this->hasMany('App\Reseaux_sociaux');
    }

    public function video() {
        return $this->hasMany('App\Video');
    }
    public function lienExtern() {
        return $this->hasMany('App\Lien_extern');
    }
    public function galerie() {
        return $this->hasMany('App\Galerie');
    }
    public function temoignage() {
        return $this->hasMany('App\Temoignage');
    }
    public function document() {
        return $this->hasMany('App\Document');
    }
    public function espaceExposition() {
        return $this->belongsTo('App\Espace_exposition');
    }
    public function statu() {
        return $this->belongsTo('App\Statu');
    }
}
