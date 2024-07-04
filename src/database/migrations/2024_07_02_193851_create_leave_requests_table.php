<?php
// database/migrations/xxxx_xx_xx_create_leave_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->string('Date', 45);
            $table->string('Leave_Type', 45);
            $table->string('Requested_Leave_Date_from', 45);
            $table->string('Requested_Leave_Date_to', 45)->nullable();
            $table->string('Description', 945);
            $table->string('Confirmed_status', 45)->nullable();
            $table->string('Confirmed_Leave_Date_from', 45)->nullable();
            $table->string('Confirmed_Leave_Date_to', 45)->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}

