<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {

        // $bookings = DB::table('bookings')
        //     ->join('vehicles', 'bookings.vehicle_id', '=', 'vehicles.id')
        //     ->join('drivers', 'bookings.driver_id', '=', 'drivers.id')
        //     ->join('users', 'bookings.user_approval_id', '=', 'users.id')
        //     ->join('users as users2', 'bookings.user_admin_id', '=', 'users2.id')
        //     ->select('bookings.*', 
        //         'vehicles.name as vehicle_name', 
        //         'drivers.name as driver_name', 
        //         'users.name as user_approval_name', 
        //         'users2.name as user_admin_name'
        //         )
        //     ->where('status', '=', 'done')
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        $bookings = DB::select( DB::raw("SELECT start_date, COUNT(*) as jml FROM bookings WHERE status = 'done' GROUP BY start_date") );

        return view('dashboard',
        [
            'title' => 'Dashboard',
            'icon' => 'fa fa-dashboard',
            'bookings' => $bookings
        ]);
    }
}
