<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homologacion extends Model {

    use HasFactory;

    protected $fillable = [
        'student_id',
        'academic_id',
        'inscription_id',
        'status',
        'creation_date',
    ];

}
