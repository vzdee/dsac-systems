<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
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

    protected $casts = [
        'scheduled_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function accountant(){
        return $this->belongsTo(Accountant::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
