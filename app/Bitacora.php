<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';
    protected $primaryKey = 'ID_Bitacora';
    public $timestamps = false;

    public function gerente() {
        return $this->belongsTo('App\Gerente', 'ID_Gerente');
    }

    public function estacion() {
        return $this->belongsTo('App\Estacion', 'ID_Estacion');
    }

}
