<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerente extends Model
{
    protected $table = 'gerentes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function bitacoras() {
        return $this->hasMany('App\Bitacora');
    }

}
