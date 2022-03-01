<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking::query()
            ->join('vehicles', 'bookings.vehicle_id', '=', 'vehicles.id')
            ->join('drivers', 'bookings.driver_id', '=', 'drivers.id')
            ->join('users', 'bookings.user_approval_id', '=', 'users.id')
            ->join('users as users2', 'bookings.user_admin_id', '=', 'users2.id')
            ->select(
                'bookings.booking_code',
                'bookings.employee_id',
                'bookings.employee_name',
                'bookings.start_date',
                'bookings.end_date',
                'vehicles.name as vehicle_name', 
                'drivers.name as driver_name', 
                'users.name as user_approval_name'
                )
            ->orderBy('bookings.created_at', 'desc')
            ->get();
    }
}
