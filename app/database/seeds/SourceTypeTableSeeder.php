<?php

class SourceTypeTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	    DB::table('source_types')->delete();
	    
	    SourceType::create(array('name'         => 'headline', 
	                             'description'  => 'headline'));
	}
}