<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('last_name', 80);
            $table->string('phone_number');
            $table->string('address');
            $table->float('lat', 8, 5)->nullable();
            $table->float('long', 8, 5)->nullable();
            $table->boolean('validated')->default(0);
            $table->string('photo')->default('no_image.jpg');
            $table->enum('role', ['superadmin', 'association', "teammanager"]);
            $table->enum('status', ['created', 'invited', "active"])->default('created');
            $table->enum('account_type', ['premium', 'free', "silver", "gold"])->default('premium');
            $table->string('password', 60);

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
        Schema::drop('users');
    }
}
