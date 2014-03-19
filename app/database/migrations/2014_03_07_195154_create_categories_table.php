<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Categories are assigned to sources.  A source may have multiple categories but
 * under initial implementations, only have one.
 */
class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->increments('category_id');
		    $table->string('name');
		    $table->string('url')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('categories');
	}

}
