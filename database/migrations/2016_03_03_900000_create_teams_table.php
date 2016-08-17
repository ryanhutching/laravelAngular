<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('club_id');
            $table->unsignedInteger('type_id')->nullable();
            $table->unsignedInteger('stadium_id')->nullable();
            $table->timestamps();

            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('set null');
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });

        Schema::create('league_team', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('league_id')->nullable();
            $table->unsignedInteger('team_id')->nullable();
            $table->timestamps();

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('set null');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('league_team');
        Schema::drop('teams');
    }
}
