<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("task_name");
            $table->string("shedule")->nullable();
            $table->integer("repeat");
            $table->string("priority")->nullable();
            $table->string("category")->nullable();
            $table->integer("month");
            $table->integer("year");
            $table->string("user");
            $table->datetime("time");
            $table->datetime("complete")->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
