<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('method_id');
            $table->string('buy_rate')->nullable();
            $table->string('min_buy')->nullable();
            $table->string('max_buy')->nullable();
            $table->string('reserve')->nullable();
            $table->timestamps();
            $table->foreign('method_id')->references('id')->on('methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyrates');
    }
}
