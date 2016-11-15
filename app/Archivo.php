<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = ['nombre', 'link'];

    /**
     * Obten todos los archivos que estan activados
     *
     * @return string
     */
    public function scopeActive($query)
    {
        return $query->where('activo', true);
    }

}
