<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $dates = ['created_at', 'updated_at', 'confirmation_date', 'appointment_date', 'reminder_date'];

    public function patient()
    {
        return $this->belongsTo('App\User', 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }

    public function receptionist()
    {
        return $this->belongsTo('App\User', 'receptionist_id');
    }

    public function isConfirmed()
    {
        return !empty($this->confirmation_date);
    }

    public function isReminded()
    {
        return !empty($this->reminder_date);
    }

    public function consultation()
    {
        return $this->hasOne('App\Consultation');
    }

    public function treatments()
    {
        return $this->belongsToMany(    'App\Treatment')->withPivot('comment');
    }
}
