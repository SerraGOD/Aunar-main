<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model {

    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'pri_nombre',
        'seg_nombre',
        'pri_apellido',
        'seg_apellido',
        'fecha_nacimientos',
        'municipio_nacimiento',
        'deparatamento_nacimiento',
        'pais_nacimiento',
        'fecha_expedicion',
        'municipio_expedicion',
        'deparatamento_expedicion',
        'pais_expedicion',
        'estado_civil',
        'rh',
        'genero',
        'libreta_militar',
        'estrato',
        'direcion_recidencia',
        'municipio_recidencia',
        'deparatamento_recidencia',
        'pais_recidencia',
        'discapacidad',
        'numero_de_hijos',
        'programa_id',
        'periodo_academico',
        'jornada',
        'fecha_saber',
        'codigo_saber',
        'puntaje_saber',
        'colegio',
        'nivel_academico',
        'eps',
        'sisben',
    ];

}
