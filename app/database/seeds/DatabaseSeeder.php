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

		$this->call('GuestbooksTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('VotesTableSeeder');
		
	}

}