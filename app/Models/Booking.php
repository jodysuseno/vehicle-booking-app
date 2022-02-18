<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'employee_id',
        'employee_name',
        'start_date',
        'end_date',
        'vehicle_id',
        'driver_id',
        'user_approval_id',
        'user_admin_id',
        'status'
    ];
}
