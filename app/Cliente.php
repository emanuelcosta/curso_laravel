<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'umparaum_clientes';

    public function endereco(){
        return $this->hasOne('App\Endereco','cliente_id','id');
    }
}
