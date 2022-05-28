<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidation extends Model {

    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'inscription_id',
        'value',
        'dateValue',
        'period',
        'dateExpiration',
    ];

}
