<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
		[
			'name' => 'Admin',
			'username' => 'service_admin',
			'email' => 'serviceadmin@gmail.com',
			'password' => Hash::make('serviceadmin'),
			'role' => 'admin',
		],
		[
			'name' => 'User',
			'username' => 'service_user',
			'email' => 'serviceuser@gmail.com',
			'password' => Hash::make('serviceuser'),
			'role' => 'user',
		]
		]);
    }
}
