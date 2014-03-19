<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavoriteSourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_favorite_sources', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->integer('user_id')->unsigned();
		    $table->integer('source_id')->unsigned();
		    
		    $table->primary(array('user_id', 'source_id'));
		    $table->foreign('user_id')
		          ->references('user_id')
		          ->on('users');
		    $table->foreign('source_id')
		          ->references('source_id')
		          ->on('sources')
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
	    Schema::drop('user_favorite_sources');
	}
}
