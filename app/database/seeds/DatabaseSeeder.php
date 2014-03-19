<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->call('RoleTableSeeder');
		$this->command->info('Roles table seeded.');
		
        $this->call('SourceTypeTableSeeder');
        $this->command->info('Source type table seeded.');
	}
}
