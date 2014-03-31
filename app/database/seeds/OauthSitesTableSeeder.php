<?php

class OauthSitesTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	    DB::table('oauth_sites')->delete();
	    
	    OauthSite::create(array('site' => 'Facebook'));
	    OauthSite::create(array('site' => 'LinkedIn'));
	    OauthSite::create(array('site' => 'Google+'));
	}
}