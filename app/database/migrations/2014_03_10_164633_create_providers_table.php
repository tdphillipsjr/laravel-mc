<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Providers are a sub-class of users.  If the provider role is set, it should be
 * marked here.
 */
class CreateProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('providers', function($table)
		{
		    $table->storage = 'InnoDB';
		    
		    $table->increments('provider_id')->unsigned();
		    $table->integer('user_id')->unsigned()->nullable();
		    $table->string('alias');
		    $table->string('alias_slug');
		    $table->timestamps();
		    $table->softDeletes();
		    
		    $table->unique('alias');
		    $table->unique('alias_slug');
		    $table->foreign('user_id')
		          ->references('user_id')
		          ->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('providers');
	}

}
