<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');

            $table->string('company_name')->nullable();
            $table->string('phone');
            $table->string('username')->unique();

            $table->integer('role')->default(0);
            $table->string('provider_id')->nullable();

            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->text('device_token')->nullable();

            $table->string('password');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
