<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $fillable = ['nombre', 'problema', 'solucion', 'link', 'marca_nombre'];

    /**
     * Scope a query to only include active proyects.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('activo', true)->take(6);
    }
}
