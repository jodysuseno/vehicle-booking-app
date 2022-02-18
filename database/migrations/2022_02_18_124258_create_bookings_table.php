<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->string('employee_id');
            $table->string('employee_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('user_approval_id');
            $table->unsignedBigInteger('user_admin_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'done']);
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('user_approval_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('user_admin_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
