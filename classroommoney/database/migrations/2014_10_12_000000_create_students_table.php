<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->date('birth');
            $table->text('address');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('id_number');
            $table->string('id_proof');
            $table->string('class');
            $table->string('section');
            $table->text('photo');
            $table->text('f_name');
            $table->text('f_phone');
            $table->text('f_occupation');
            $table->text('m_name');
            $table->text('m_occupation');
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
        Schema::dropIfExists('users');
    }
}
