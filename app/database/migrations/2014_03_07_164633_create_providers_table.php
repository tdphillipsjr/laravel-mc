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
		    $table->text('intro')->nullable();
		    $table->tinyInteger('active')->default(1);
		    $table->text('bio')->nullable();
		    $table->float('rating')->nullable()->default(0);
		    $table->integer('totalrating')->nullable()->default(0);
		    $table->integer('num_ratings')->default(0);
		    $table->float('years_experience')->nullable();
		    $table->string('cover_letter_file', 500)->nullable();
		    $table->text('cover_letter_text')->nullable();
		    $table->string('certifications', 500);
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
