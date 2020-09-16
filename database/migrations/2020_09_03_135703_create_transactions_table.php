<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('role',['sell','buy']);
            $table->string('send_method');
            $table->string('receive_method');
            $table->float('amount_dollar');
            $table->float('amount_BDT');
            $table->string('user_money_rec_ac');
            $table->string('user_money_send_ac');
            $table->string('trx_id')->nullable(true);
            $table->string('user_contact');
            $table->enum('status',['pending','cancelled','succeed']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
