<?php

class RoleTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	    DB::table('roles')->delete();
	    
	    Role::create(array('name' => 'user'));
	    Role::create(array('name' => 'provider'));
	    Role::create(array('name' => 'admin'));
	}
}