<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'client_id',
        'accountant_id',
        'service_id',
        'scheduled_at',
        'status', //pending cancelled completed
        'price', 
        'notes', 
    ];
}
