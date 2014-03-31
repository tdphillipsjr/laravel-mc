<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->increments('user_id');
		    $table->string('username', 100)->unique();
		    $table->string('first_name');
		    $table->string('last_name');
		    $table->string('email', 255)->unique();
		    $table->string('password', 100);
		    $table->date('birthday')->nullable();
		    $table->enum('gender', array('male', 'female'))->nullable();
		    $table->tinyInteger('active')->default(1);
		    $table->integer('role_id')->default(1);
		    $table->tinyInteger('send_email')->default(0);
		    $table->string('avatar')->nullable();
		    $table->string('avatar_background')->nullable();
		    $table->string('marital_status')->nullable();
		    $table->string('ethnicity')->nullable();
		    $table->string('income')->nullable();

		    $table->timestamps();
		    $table->softDeletes();
		    
		    $table->index(array('email', 'password'));
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
