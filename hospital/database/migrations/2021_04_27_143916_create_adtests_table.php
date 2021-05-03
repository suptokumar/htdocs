<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adtests', function (Blueprint $table) {
            $table->id();
            $table->text("em_id");
            $table->text("test_name");
            $table->text("test_amount");
            $table->text("test_discount");
            $table->text("test_total");
            $table->text("test_paid");
            $table->text("test_time");
            $table->text("adder");
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
        Schema::dropIfExists('adtests');
    }
}
