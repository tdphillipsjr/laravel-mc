<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function($table)
		{
		    $table->storage = 'InnoDB';
		    
		    $table->increments('price_id');
		    $table->integer('pricing_option_id')->unsigned();
		    $table->integer('user_id')->unsigned();
		    $table->float('price');
		    $table->tinyInteger('enabled')->default(0);
		    
		    $table->timestamps();
		    
		    $table->foreign('user_id')
		          ->references('user_id')
		          ->on('users');
		    $table->foreign('pricing_option_id')
		          ->references('pricing_option_id')
		          ->on('pricing_options');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prices');
	}

}
