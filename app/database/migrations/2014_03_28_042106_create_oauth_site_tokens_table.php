<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauthSiteTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oauth_site_tokens', function($table)
		{
		    $table->storage = 'InnoDB';
		    
		    $table->increments('id');
		    $table->integer('oauth_site_id')->unsigned();
		    $table->integer('user_id')->unsigned();
		    $table->integer('user_external_site_id');
		    $table->string('oauth_token', 500);
		    $table->dateTime('oauth_expires');
		    $table->timestamps();
		    
		    $table->foreign('user_id')
		          ->references('user_id')
		          ->on('users');
		    $table->foreign('oauth_site_id')
		          ->references('oauth_site_id')
		          ->on('oauth_sites');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oauth_site_tokens');
	}

}
