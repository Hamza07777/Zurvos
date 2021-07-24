<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddyWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddy_workouts', function (Blueprint $table) {
            $table->bigIncrements('buddy_workout_id');
            $table->unsignedBigInteger('cust_id');
            $table->unsignedBigInteger('buddy_id');
            $table->unsignedBigInteger('buddy_workout_id_from_workouts');
            // $table->enum('buddy_workout_type', ['indoor', 'outdoor'])->default('indoor');
            // $table->enum('buddy_workout_level', ['easy', 'hard', 'intense'])->default('easy');
            // $table->string('buddy_workout_goals')->nullable()->length(500);
            $table->string('buddy_workout_time');
            // $table->enum('buddy_for_type', ['self', 'buddy'])->default('buddy');
            $table->enum('request_status', ['pending','accept', 'reject'])->default('pending');
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
        Schema::dropIfExists('buddy_workouts');
    }
}
