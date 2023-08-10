<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory;
    // protected $table = 'appointments';
    public $timestamps = false;

    protected $fillable = [
        'schedule_id',
        'timeslot_id',
        'service_id',
        'name',
        'email',
        'address',
        'phone_number',
        'notes',
        'status',
    ];

}
