<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    protected $table = 'formato_bitacora';
    protected $primaryKey = 'ID_Formato';
    public $timestamps = false;

    public function campoParticular() {
        return $this->belongsTo('App\CampoParticular', 'ID_Particular');
    }

    public function tipoBitacora() {
        return $this->belongsTo('App\TipoBitacora', 'ID_Tipo_Bitacora');
    }


}
