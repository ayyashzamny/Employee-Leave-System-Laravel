<?php

// database/migrations/xxxx_xx_xx_create_employees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('First_Name', 45);
            $table->string('Last_Name', 45);
            $table->string('Full_Name', 45);
            $table->string('LNIC', 45);
            $table->string('Gender', 45);
            $table->string('Contact_no1', 45);
            $table->string('Contact_no2', 45)->nullable();
            $table->string('Address', 945);
            $table->string('Active_Status', 45);
            $table->date('Permenent_date');

            // Foreign Keys
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');

            $table->string('Email', 45);
            $table->string('Password', 255);
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
