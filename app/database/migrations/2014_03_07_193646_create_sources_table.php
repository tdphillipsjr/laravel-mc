<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * The sources are where links are being aggregated from.  In a news aggregator, they are
 * the RSS Feed of the website.  For a scheduler, they're a link to the schedule.  ETC
 */
class CreateSourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sources', function($table)
		{
    	    $table->engine = 'InnoDB';
	    
	        $table->increments('source_id');
	        $table->string('name');
    	    $table->string('url');
	    
	        // The source type refers to the parent website, as one website may have many feeds.
	        $table->integer('source_type_id')->unsigned();
	        $table->integer('link_generator_id')->unsigned();
    	    $table->tinyInteger('default_view')->default(1);
	        $table->tinyInteger('is_error')->default(0);
	        $table->integer('refer_count')->default(0);
	        
	        $table->foreign('source_type_id')
	              ->references('source_type_id')
	              ->on('source_types');
            $table->foreign('link_generator_id')
                  ->references('link_generator_id')
                  ->on('link_generators');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sources');
	}

}
