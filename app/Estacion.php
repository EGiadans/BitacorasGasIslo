<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
    protected $table = 'estaciones';
    protected $primaryKey = 'ID_Estacion';
    public $timestamps = false;

    public function bitacoras() {
        return $this->hasMany('App\Bitacora');
    }
}
