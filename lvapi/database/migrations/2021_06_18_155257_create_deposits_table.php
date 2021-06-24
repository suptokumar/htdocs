<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->text("idm");
            $table->text("exchange");
            $table->text("username");
            $table->text("phone");
            $table->text("amount");
            $table->text("currency");
            $table->text("screenshot");
            $table->text("status");
            $table->text("gateway");
            $table->text("depositid");
            $table->text("deposittype");
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
        Schema::dropIfExists('deposits');
    }
}
