<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'alert_user_id',
        'alert_name',
        'alert_description',
        'alert_category',
        'alert_type',
        'alert_send_type',
        'alert_see_report',
    ];
}
