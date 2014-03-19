<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavoriteCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_favorite_categories', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->integer('user_id')->unsigned();
		    $table->integer('category_id')->unsigned();
		    
		    $table->primary(array('user_id', 'category_id'));
		    $table->foreign('user_id')
		          ->references('user_id')
		          ->on('users');
		    $table->foreign('category_id')
		          ->references('category_id')
		          ->on('categories')
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
	    Schema::drop('user_favorite_categories');
	}
}
