<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myresults', function (Blueprint $table) {
            $table->id();
            $table->text("subject");
            $table->text("student");
            $table->text("teacher");
            $table->text("mark");
            $table->text("attend");
            $table->text("status");
            $table->text("grades");
            $table->text("amount");
            $table->text("withstatus");
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
        Schema::dropIfExists('myresults');
    }
}
