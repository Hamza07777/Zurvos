<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_videos', function (Blueprint $table) {
            $table->bigIncrements('workout_video_id');
            $table->unsignedBigInteger('workout_id');
            $table->unsignedBigInteger('cust_id');
            $table->unsignedBigInteger('ex_lib_id');
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
        Schema::dropIfExists('workout_videos');
    }
}
