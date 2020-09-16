<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('method_id');
            $table->string('sell_rate')->nullable();
            $table->string('min_sell')->nullable();
            $table->string('max_sell')->nullable();
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
        Schema::dropIfExists('sellrates');
    }
}
