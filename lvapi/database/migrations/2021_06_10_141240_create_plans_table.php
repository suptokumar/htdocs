<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("icon");
            $table->text("max_withdraw_amount");
            $table->text("max_withdraw_perday");
            $table->text("max_withdraw_month");
            $table->text("min_withdraw_amount");
            $table->text("min_refil_amount");
            $table->text("min_maintaining_amount");
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
        Schema::dropIfExists('plans');
    }
}
