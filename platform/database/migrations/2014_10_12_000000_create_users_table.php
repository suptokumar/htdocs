<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image');
            $table->integer('key');
            $table->integer('type');
            $table->text('available_time');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('email_phone_at')->nullable();
            $table->string('password');
            $table->string('address1');
            $table->string('country');
            $table->string('timezone');
            $table->string('gurdain_id');
            $table->string('hours');
            $table->string('education');
            $table->string('national_id');
            $table->text('national_id_front');
            $table->text('national_id_back');
            $table->text('status');
            $table->text('evalu');
            $table->text('reg_evalu');
            $table->string('cv');
            $table->text('calender_link');
            $table->text('bio');
            $table->text('zoom_link');
            $table->string('gender');
            $table->date('dateofbirth');
            $table->rememberToken();
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
