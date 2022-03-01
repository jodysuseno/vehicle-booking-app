<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingsExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
// use Response;

class BookingController extends Controller
{

    public function index(){

        $bookings = DB::table('bookings')
            ->join('vehicles', 'bookings.vehicle_id', '=', 'vehicles.id')
            ->join('drivers', 'bookings.driver_id', '=', 'drivers.id')
            ->join('users', 'bookings.user_approval_id', '=', 'users.id')
            ->join('users as users2', 'bookings.user_admin_id', '=', 'users2.id')
            ->select('bookings.*', 
                'vehicles.name as vehicle_name', 
                'drivers.name as driver_name', 
                'users.name as user_approval_name', 
                'users2.name as user_admin_name'
                )
            ->orderBy('created_at', 'desc')
            ->get();
        return view('booking.index',[
            'title' => 'Booking',
            'icon' => 'fa fa-book',
            'bookings' => $bookings
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        return view('booking.create',[
            'title' => 'Booking',
            'icon' => 'fa fa-book',
            'vehicles' => DB::table('vehicles')->get(),
            'drivers' => DB::table('drivers')->get(),
            'approvers' => DB::table('users')->where('level', 'approver')->get(),
            'status' => DB::table('bookings')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_code' => 'required|string|max:255|unique:bookings',
            'employee_id' => 'required',
            'employee_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'user_approval_id' => 'required',
        ]);

        Booking::create([
            'booking_code' => $request->booking_code,
            'employee_id' => $request->employee_id,
            'employee_name' => $request->employee_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'user_approval_id' => $request->user_approval_id,
            'user_admin_id' => auth()->user()->id,
            'status' => 'pending'
        ]);

        return redirect()->route('booking.index')->with('status', 'booking has been created');
    }

    public function destroy($id){
        Booking::destroy($id);
        return redirect()->route('booking.index')->with('status', 'booking has been deleted');
    }

    public function approve($id){
        $booking = Booking::find($id);
        $booking->status = 'approved';
        $booking->save();
        return redirect()->route('booking.index')->with('status', 'booking has been approved');
    }

    public function reject($id){
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();
        return redirect()->route('booking.index')->with('status', 'booking has been rejected');
    }

    public function done($id){
        $booking = Booking::find($id);
        $booking->status = 'done';
        $booking->save();
        return redirect()->route('booking.index')->with('status', 'booking has been Conformed');
    }

    public function report(){
        $bookings = DB::table('bookings')
            ->join('vehicles', 'bookings.vehicle_id', '=', 'vehicles.id')
            ->join('drivers', 'bookings.driver_id', '=', 'drivers.id')
            ->join('users', 'bookings.user_approval_id', '=', 'users.id')
            ->join('users as users2', 'bookings.user_admin_id', '=', 'users2.id')
            ->select('bookings.*', 
                'vehicles.name as vehicle_name', 
                'drivers.name as driver_name', 
                'users.name as user_approval_name', 
                'users2.name as user_admin_name'
                )
            ->orderBy('created_at', 'desc')
            ->get();
        return view('report.periodic',[
            'title' => 'Booking Periodic',
            'icon' => 'fa fa-book',
            'bookings' => $bookings
        ]);
    }

    public function export(){

        return Excel::download(new BookingsExport, 'bookings.xlsx');
        // return Excel::download(new UsersExport, 'users.xlsx');
        // $bookings = Booking::all();

        // $handle = fopen('export.csv', 'w');

        // foreach ($bookings as $row) {
        //     fputcsv($handle, $row->toArray(), ';');
        // }

        // fclose($handle);

        // $filepath = public_path('export.csv');
        // return Response::download($filepath);
        // return redirect()->route('booking.index')->with('status', 'Data has ben downloaded');
    }
}
