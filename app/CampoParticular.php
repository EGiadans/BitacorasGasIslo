<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampoParticular extends Model
{
    protected $table = 'campos_particulares';
    protected $primaryKey = 'ID_Particular';
    public $timestamps = false;

    public function formato(){
        $this->hasOne('App\Formato');
    }
}
