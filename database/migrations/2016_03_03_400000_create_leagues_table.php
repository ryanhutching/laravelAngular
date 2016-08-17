<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('season');
            $table->string('grafics')->default('default.png');
            $table->unsignedInteger('league_format_id');
            $table->text('description');
            $table->unsignedInteger('teams_number');
            $table->timestamps();

            $table->foreign('league_format_id')->references('id')->on('league_format');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leagues');
    }
}
