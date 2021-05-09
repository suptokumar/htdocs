<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoinments', function (Blueprint $table) {
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
            $table->text("token");
            $table->text("total");
            $table->text("paid");
            $table->text("past");
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
        Schema::dropIfExists('apoinments');
    }
}
