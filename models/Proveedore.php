<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    protected $table = 'proveedores';
    protected $fillable = [''];

    public function productos()
    {
        return $this->hasMany(Producto::class);

    }
}