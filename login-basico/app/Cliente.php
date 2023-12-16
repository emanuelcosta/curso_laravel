<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function nome_sobrenome(){
        return $this->getAttribute('nome').' '.$this->getAttribute('sobrenome');
    }
}
