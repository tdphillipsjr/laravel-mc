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
		    $table->string('email_address', 255)->unique();
		    $table->string('password', 100);
		    $table->date('birthday')->nullable();
		    $table->enum('gender', array('male', 'female'))->nullable();
		    $table->tinyInteger('is_confirmed')->default(0);
		    $table->timestamps();
		    $table->softDeletes();
		    
		    $table->index(array('email_address', 'password'));
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
