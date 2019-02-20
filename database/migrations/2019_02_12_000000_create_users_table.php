<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('designation_id')->unsigned();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->string('email', 255);
            $table->string('role');
            $table->string('password');
            $table->string('name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->integer('status');
            $table->string('team_lead');
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
