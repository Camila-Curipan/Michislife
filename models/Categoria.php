<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [''];

    /*funcion para llave foranea de uno a muchos */
    public function productos()
    {
        return $this->hasMany(Producto::class);

    }
}
