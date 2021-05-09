<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->text("em_id");
            $table->text("name");
            $table->text("age");
            $table->text("contact");
            $table->text("gender");
            $table->text("village");
            $table->text("thana");
            $table->text("district");
            $table->text("date");
            $table->text("consultant");
            $table->text("con_id");
            $table->text("reffered");
            $table->text("room_id");
            $table->text("room");
            $table->text("total");
            $table->text("paid");
            $table->text("discharge");
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
        Schema::dropIfExists('admissions');
    }
}
