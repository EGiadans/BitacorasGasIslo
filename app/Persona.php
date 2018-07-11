<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
