<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestionpago extends Model {

    use HasFactory;

    protected $fillable = [
        'pago_id',
        'estudent_id',
        'financial_id',
        'inscription_id',
        'status',
        'soporte_de_pago',
        'creation_date',
    ];

}
