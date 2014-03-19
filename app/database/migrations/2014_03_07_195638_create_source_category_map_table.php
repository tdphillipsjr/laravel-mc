<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceCategoryMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sources_categories_map', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->integer('source_id')->unsigned();
		    $table->integer('category_id')->unsigned();
		    
		    // Keys
		    $table->primary(array('source_id', 'category_id'));
    	    $table->foreign('source_id')
	              ->references('source_id')
	              ->on('sources')
	              ->onDelete('cascade');
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
		Schema::drop('sources_categories_map');
	}

}
