<?php
	
	use Illuminate\Database\Seeder;
	
	class UsersTableSeeder extends Seeder{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(){
			DB::table('users')->insert([
				'name' => env('ADMIN_LOGIN'),
				'password' => bcrypt(env('ADMIN_PASSWORD', 'admin')),
				'email_verified_at' => now(),
				'created_at' => now(),
				'updated_at' => now(),
				'email' => env('ADMIN_EMAIL')
			]);
		}
	}
