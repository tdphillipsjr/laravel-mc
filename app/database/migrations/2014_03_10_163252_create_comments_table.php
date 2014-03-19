<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('comments', function($table)
	    {
	        $table->engine = 'InnoDB';
	        
	        $table->increments('comment_id');
	        $table->integer('link_id')->unsigned();
	        $table->integer('user_id')->unsigned();
	        $table->text('comment_text');
	        $table->timestamps();
	        
	        $table->foreign('link_id')
	              ->references('link_id')
	              ->on('links')
	              ->onDelete('cascade');
	        $table->foreign('user_id')
	              ->references('user_id')
	              ->on('users')
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
		Schema::drop('comments');
	}

}
