<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('father_name');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('local_address');
            $table->string('permanent_address');
            $table->string('image_preview_location');
            $table->string('employee_id');
            $table->string('department');
            $table->string('designation');
            $table->string('date_of_joining');
            $table->string('joining_salary');
            $table->string('account_holder_name');
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('pan_number');
            $table->string('branch');
            $table->string('resume_location');
            $table->string('offer_letter_location');
            $table->string('joining_letter_location');
            $table->string('contract_and_agreement_location');
            $table->string('id_proof_location');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
