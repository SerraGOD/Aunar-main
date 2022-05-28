<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestionhomologacion extends Model {

    use HasFactory;

    protected $fillable = [
        'student_id',
        'academic_id',
        'inscription_id',
        'description',
        'acta_homologacion',
        'status',
        'creation_date',
    ];

}
