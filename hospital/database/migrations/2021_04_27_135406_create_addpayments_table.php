<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addpayments', function (Blueprint $table) {
            $table->id();
            $table->text("em_id");
            $table->text("adder");
            $table->text("total");
            $table->text("paid");
            $table->text("room_register");
            $table->text("date");
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
        Schema::dropIfExists('addpayments');
    }
}
