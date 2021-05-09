<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmargenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emargencies', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("age");
            $table->text("contact");
            $table->text("gender");
            $table->text("village");
            $table->text("thana");
            $table->text("district");
            $table->text("date");
            $table->text("consultant");
            $table->text("reffered");
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
        Schema::dropIfExists('emargencies');
    }
}
