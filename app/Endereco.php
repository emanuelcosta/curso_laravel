<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "umparaum_enderecos";

    public function cliente(){
        return $this->belongsTo('App\Cliente', 'cliente_id','id');
    }
}
