<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //new fields for client
    protected $fillable = [
        'user_id',
        'person_type', //fisica o moral
        'fiscal_regime',
        'economic_activity',
        'cfdi_use',
        'address',
        'zip_code',
        'status', // activo o inactivo
        'notes', // cualquier información adicional sobre el cliente
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
