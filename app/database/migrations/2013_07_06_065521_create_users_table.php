<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
			$table->string('password');
			$table->string('email');
			$table->text('description');
			$table->string('genre');
			$table->string('origin');
			$table->string('picture')->nullable();
			$table->string('youtube')->nullable();
			$table->string('music')->nullable();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('address');
			$table->string('city');
            $table->string('telefon');
			$table->boolean('aktivkz')->default(0);
            $table->boolean('admin')->default(0);
            $table->boolean('agb')->default(0);
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
