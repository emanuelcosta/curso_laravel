<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "umparamuitos_produtos";

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id', 'id');
    }

}
