<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model {

    use HasFactory;

    protected $fillable = [
        'id',
        'Codigo',
        'Nombre',
        'Abreviatura_Q10ID',
        'N_Res_autorización',
        'F_Res_autorizacion',
        'Aplica_para_grupos',
        'Aplica_para_preinscripciones',
        'Tipo_de_evaluacion',
        'Estado',
    ];

}
