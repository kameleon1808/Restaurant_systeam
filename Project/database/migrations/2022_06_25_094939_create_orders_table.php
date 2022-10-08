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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('legal_id')->nullable()->unsigned();
            $table->foreign('legal_id')->references('id')->on('legals')->onDelete('cascade');

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');

            $table->timestamp('order_date');
            $table->string('payment_method')->default('pouzecem');
            $table->string('shipping_address')->nullable();
            $table->string('shipping_from')->nullable();
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->text('comments')->nullable();
            $table->string('price')->nullable();


            $table->string('cart_id')->nullable();
            $table->string('article_name')->nullable();
            $table->string('prod_qty')->nullable();

            $table->string('accepted')->nullable()->default('Prihvati');
            $table->tinyInteger('canceled')->default(0);



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
        Schema::dropIfExists('orders');
    }
};
