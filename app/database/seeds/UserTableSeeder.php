<?php

class UserTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name' => 'Masiur',
			'username' => 'masiur',
			'email' => 'mrsiddiki@gmail.com',
			'password' => Hash::make('awesome'),

			));
	}
}