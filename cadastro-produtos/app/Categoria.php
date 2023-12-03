<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "umparamuitos_categorias";

    public function produtos(){
        return $this->hasMany('App\Produto', 'categoria_id', 'id');
    }
}
