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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // // $table->foreignId('legal_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('legal_id')->nullable()->unsigned();
            $table->foreign('legal_id')->references('id')->on('legals')->onDelete('cascade');
            $table->bigInteger('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->double('price')->nullable();

            $table->integer('prod_qty')->default(1);
            $table->tinyInteger('confirmed')->default(0);

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
        Schema::dropIfExists('carts');
    }
};
