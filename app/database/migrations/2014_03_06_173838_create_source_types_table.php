<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    // Create source types table
		Schema::create('source_types', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->increments('source_type_id');
		    $table->string('name');
		    $table->text('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('source_types');
	}

}
