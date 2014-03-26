<?php

class ApiUserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            $user = new User;
            $user->username = 'CHEUNGD';
            $user->password = '';
            $user->api_key = Str::random(32);
            $user->save();
	}

}