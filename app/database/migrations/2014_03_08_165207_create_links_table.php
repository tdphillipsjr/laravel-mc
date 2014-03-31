<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('links', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->increments('link_id');
		    $table->string('url');
		    $table->string('title');
		    $table->integer('provider_id')->unsigned()->nullable();
		    $table->integer('comment_count')->default(0);
		    $table->integer('source_id')->unsigned();
		    $table->string('sha_sum');
		    $table->integer('refer_count')->default(0);
		    $table->dateTime('publish_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamps();
		    
		    $table->unique('sha_sum');
		    $table->index(array('source_id', 'publish_date'));
		    
		    $table->foreign('source_id')
		          ->references('source_id')
		          ->on('sources')
		          ->onDelete('cascade');
            $table->foreign('provider_id')
                  ->references('provider_id')
                  ->on('providers');
		});
		        
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('links');
	}

}
