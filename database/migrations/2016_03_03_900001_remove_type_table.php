<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function ($table) {
            $table->dropForeign('teams_type_id_foreign');
            $table->dropColumn('type_id');
            $table->enum('type', ['MEN', 'WOMEN', 'YOUTH']);
        });

        Schema::drop('types');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        if (!(Schema::hasTable('types'))) {
            Schema::create('types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('key');
                $table->timestamps();
            });
        }

        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedInteger('type_id')->nullable();
            $table->dropColumn('type');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }
}
