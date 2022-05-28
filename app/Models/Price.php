<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model {

    use HasFactory;

    protected $fillable = [
        'id',
        'programa_id',
        'concept',
        'value_ordinary',
        'value_with_discount',
        'percentage_discount',
        'discount_strategy',
    ];

}
