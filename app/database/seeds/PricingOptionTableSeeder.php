<?php

class PricingOptionTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	    DB::table('pricing_options')->delete();
	    
	    PricingOption::create(array('name' => '30 Minutes',
	                                'slug' => '30-minutes'));
	    PricingOption::create(array('name' => '60 Minutes',
	                                'slug' => '60-minutes'));
	    PricingOption::create(array('name' => '90 Minutes',
	                                'slug' => '90-minutes'));
	    PricingOption::create(array('name' => 'Hourly',
	                                'slug' => 'hourly'));
	    PricingOption::create(array('name' => 'Package',
	                                'slug' => 'package'));
	}
}