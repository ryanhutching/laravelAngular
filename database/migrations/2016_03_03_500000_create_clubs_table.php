<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->default('no_image.jpg');
            $table->string('name');
            $table->string('short_name', 3);
            $table->text('description');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('stadium_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('address');
            $table->float('lat', 8, 5)->nullable();
            $table->float('long', 8, 5)->nullable();
            $table->boolean('validated')->default(0);
            $table->string('home_page')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clubs');
    }
}
