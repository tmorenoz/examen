<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    public function scopeListaUsuarios($query){
        return $query->join('empresas','usuarios.empresa_id','=','empresas.id')
                    ->join('categorias','usuarios.categoria_id','=','categorias.id');
    }
}
