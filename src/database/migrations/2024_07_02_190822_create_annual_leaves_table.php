<?php

// database/migrations/xxxx_xx_xx_create_annual_leaves_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualLeavesTable extends Migration
{
    public function up()
    {

        Schema::create('annual_leaves', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('Employee_idEmployee');
            $table->foreign('Employee_idEmployee')->references('id')->on('employees')->onDelete('cascade');

            $table->year('year');
            $table->integer('total_casual_leaves');
            $table->integer('total_medical_leaves');
            $table->integer('balance_casual_leaves');
            $table->integer('balance_medical_leaves');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('annual_leaves');
    }
}
