<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonoliquidacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_liquidation',
        'id_liquidacionSerie',
        'inscription_id',            
        'value',
        'dateValue',
        'period',
        'dateExpiration',
    ];
}
