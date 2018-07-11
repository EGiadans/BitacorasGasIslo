<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBitacora extends Model
{
    protected $table = 'tipo_bitacora';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public function formatos() {
        return $this->hasMany('App\Formato');
    }
}
