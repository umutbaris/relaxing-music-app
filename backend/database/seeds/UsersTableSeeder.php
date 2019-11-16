<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $users = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@dawn-cms',
                'password' => 'superadmin',
            ],
        ];

        foreach ($users as $user) {
            $user['password'] = Hash::make($user['password']);
            $userCreated = User::create($user);
        }	
	}
}
