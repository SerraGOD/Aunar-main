<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos_user extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'tipo_form',
        'descripcion',
        'copia_de_cedula',
        'certificado_eps',
        'registro_civil',
        'acta_diploma_bachiller',
        'foto_documento',
        'resultados_saber',
        'ficha_inscripcion',
        'formato_tratamiento',
        'examen_medico',
        'examen_serologia',
        'soporte_pago',
        'resolucion_acta_homologacion',
        'formato_estudio_homologacion',
        'certificado_notas',
        'contenidos_tematicos',
        'carnet_vacunas',
        'actualizacion_activa',
    ];
}
