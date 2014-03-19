<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavoriteProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_favorite_providers', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->integer('user_id')->unsigned();
		    $table->integer('provider_id')->unsigned();
		    
		    $table->primary(array('user_id', 'provider_id'));
		    $table->foreign('user_id')
		          ->references('user_id')
		          ->on('users');
		    $table->foreign('provider_id')
		          ->references('provider_id')
		          ->on('providers')
		          ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('user_favorite_providers');
	}
}
