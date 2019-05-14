<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('project_name');
            $table->string('location');
            $table->string('topics');
            $table->string('date');
            $table->string('time');
            $table->string('meeting_content',10000);
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
        Schema::dropIfExists('meeting_records');
    }
}
