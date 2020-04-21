<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'id_doctor');
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'id_patient');
    }
}
