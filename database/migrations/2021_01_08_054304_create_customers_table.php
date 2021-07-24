<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('cust_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female']);
            $table->string('t_shirt_size')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('zip_code')->nullable();
            $table->string('bio')->nullable();
            $table->string('city')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('user_image')->nullable();
            $table->string('affiliated_link')->nullable();

            $table->enum('customer_type', ['customer', 'influencer']);
            $table->enum('status', ['inactive', 'active']);

            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->string('paypalemail')->unique()->nullable();
            $table->string('paypalemail_document')->unique()->nullable();
            $table->string('cover_image')->nullable();

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
        Schema::dropIfExists('customers');
    }
}
