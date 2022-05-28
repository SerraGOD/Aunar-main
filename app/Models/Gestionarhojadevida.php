<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestionarhojadevida extends Model {

    use HasFactory;

    protected $fillable = [
        'student_id',
        'agent_id',
        'inscription_id',
        'description',
        'status',
        'correciones',
        'creation_date',
    ];

}
