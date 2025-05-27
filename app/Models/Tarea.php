<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'ID_Tarea';
    public $timestamps = false; // Desactiva los timestamps automáticos

    protected $fillable = [
        'Tarea',
        'Estado',
        'Fecha_Creacion',
        'Fecha_Completado'
    ];

    protected $casts = [
        'Fecha_Creacion' => 'datetime',
        'Fecha_Completado' => 'datetime'
    ];
}
