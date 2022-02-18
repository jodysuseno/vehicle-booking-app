<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'jody ririt krido suseno',
            'email' => 'jodysuseno@gmail.com',
            'username' => 'jodysuseno',
            'password' => bcrypt('admin123'),
            'level' => 'admin'
        ]);
        User::create([
            'name' => 'Jafar',
            'email' => 'jafar@gmail.com',
            'username' => 'jafardjawas',
            'password' => bcrypt('jafar123'),
            'level' => 'approver'
        ]);

        Vehicle::create([
            'plate_number' => 'B 12344',
            'name' => 'toyota',
            'type' => 'people transportation',
            'ownership' => 'has own',
            'years' => '2018'
        ]);
        Vehicle::create([
            'plate_number' => 'B 12345',
            'name' => 'Isuzu',
            'type' => 'people transportation',
            'ownership' => 'has own',
            'years' => '2018'
        ]);
        Vehicle::create([
            'plate_number' => 'B 12346',
            'name' => 'Honda Jazz',
            'type' => 'people transportation',
            'ownership' => 'has own',
            'years' => '2017'
        ]);
        Vehicle::create([
            'plate_number' => 'B 12347',
            'name' => 'Truck Hino',
            'type' => 'freight transport',
            'ownership' => 'rent',
            'years' => '2017'
        ]);
        Vehicle::create([
            'plate_number' => 'B 12348',
            'name' => 'Truck Mitsubishi',
            'type' => 'freight transport',
            'ownership' => 'rent',
            'years' => '2016'
        ]);

        Driver::create([
            'id_card' => '123456789',
            'name' => 'John Doe',
            'phone' => '08123456789',
            'address' => 'Jl. Raya Bogor KM. 10'
        ]);
        Driver::create([
            'id_card' => '123456780',
            'name' => 'Jane Doe',
            'phone' => '08123456780',
            'address' => 'Jl. Raya Tangerang KM. 10'
        ]);
        Driver::create([
            'id_card' => '123456781',
            'name' => 'Jack Doe',
            'phone' => '08123456781',
            'address' => 'Jl. Raya Bandung KM. 10'
        ]);

        Booking::create([
            'booking_code' => 'VB2202150001',
            'employee_id' => 'E001',
            'employee_name' => 'Jarwo',
            'start_date' => '2022-02-15',
            'end_date' => '2022-02-15',
            'vehicle_id' => '1',
            'driver_id' => '1',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202160001',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-16',
            'end_date' => '2022-03-17',
            'vehicle_id' => '2',
            'driver_id' => '2',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202160002',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-16',
            'end_date' => '2022-03-17',
            'vehicle_id' => '3',
            'driver_id' => '3',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202170001',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-17',
            'end_date' => '2022-03-18',
            'vehicle_id' => '2',
            'driver_id' => '1',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202170002',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-17',
            'end_date' => '2022-03-18',
            'vehicle_id' => '4',
            'driver_id' => '2',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202180001',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-18',
            'end_date' => '2022-03-19',
            'vehicle_id' => '1',
            'driver_id' => '3',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202190001',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-19',
            'end_date' => '2022-03-19',
            'vehicle_id' => '3',
            'driver_id' => '1',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202190002',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-19',
            'end_date' => '2022-03-20',
            'vehicle_id' => '4',
            'driver_id' => '2',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'done'
        ]);
        Booking::create([
            'booking_code' => 'VB2202190003',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-19',
            'end_date' => '2022-03-20',
            'vehicle_id' => '4',
            'driver_id' => '3',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'pending'
        ]);
        Booking::create([
            'booking_code' => 'VB2202190004',
            'employee_id' => 'E002',
            'employee_name' => 'Adit',
            'start_date' => '2022-02-19',
            'end_date' => '2022-03-20',
            'vehicle_id' => '4',
            'driver_id' => '1',
            'user_approval_id' => '2',
            'user_admin_id' => '1',
            'status' => 'pending'
        ]);
        

    }
}
