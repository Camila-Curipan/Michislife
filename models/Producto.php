<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [''];

    /*funcion para llave foranea de uno a muchos*/
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);

    }


    public function proveedores()
    {
        return $this->belongsTo(Proovedore::class);

    }
    
}