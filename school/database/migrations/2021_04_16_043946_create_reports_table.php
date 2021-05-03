<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->string("link");
            $table->string("subject");
            $table->integer("duration");
            $table->string("timezone");
            $table->datetime("starting");
            $table->string("teacher");
            $table->string("student");
            $table->string("t_id");
            $table->string("s_id");
            $table->string("guest");
            $table->string("guest_active");
            $table->string("repeat");
            $table->string("ras");
            $table->text("notes");
            $table->text("assignment");
            $table->text("status");
            $table->datetime("lastclass")->nullable();
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
        Schema::dropIfExists('reports');
    }
}
