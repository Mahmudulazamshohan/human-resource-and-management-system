<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('time_in');
            $table->string('ime_out');
            $table->string('hours_worked_int');
            $table->string('hours_worked_str');
            $table->string('shift_start');
            $table->string('shift_end');
            $table->string('tardiness_str');
            $table->string('tardiness_int');
            $table->string('overtime_str');
            $table->string('overtime_int');
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
        Schema::dropIfExists('staff_schedules');
    }
}
