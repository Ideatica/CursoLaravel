<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUseridOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function($table) {
            $table->date('fecha_nacimiento');
            $table->integer('user_id')->unsigned();

            $table->string('calle');
            $table->string('numeracion');
            $table->string('dpto');

            $table->integer('comuna_id')->unsigned();
            $table->integer('pais_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
