<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->text("exam_id");
            $table->text("book");
            $table->text("user");
            $table->text("question");
            $table->text("answer");
            $table->text("correct");
            $table->text("starter");
            $table->text("grade");
            $table->text("earning");
            $table->text("exam_status");
            $table->text("earning_status");
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
        Schema::dropIfExists('exams');
    }
}
