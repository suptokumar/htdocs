<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idmanagers', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("phone");
            $table->text("exchange");
            $table->text("plan");
            $table->text("username");
            $table->text("password");
            $table->text("status");
            $table->text("mode");
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
        Schema::dropIfExists('idmanagers');
    }
}
