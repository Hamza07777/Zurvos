<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->bigIncrements('workout_id');
            $table->unsignedBigInteger('cust_id');
            $table->enum('workout_type', ['indoor', 'outdoor'])->default('indoor');
            $table->enum('workout_level', ['easy', 'hard', 'intense'])->default('easy');
            $table->string('workout_goals')->nullable()->length(500);
            $table->enum('for_type', ['self', 'buddy'])->default('self');
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
        Schema::dropIfExists('workouts');
    }
}
