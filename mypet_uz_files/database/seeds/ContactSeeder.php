<?php
	
	use Illuminate\Database\Seeder;
	
	class ContactSeeder extends Seeder{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(){
			DB::table('contacts')->insert([
				'logo_pic' => 'logo-pic.png',
				'logo_name' => 'logo-name.png',
				'description' => "Интернет магазин, который предлагает широкий ассортимент животных, с Бесплатной Доставкой от <b>200 000</b> сум в Ташкенте!",
				'email' => 'd.valiev@student.inha.uz',
				'phone' => '998 91 539 79 89',
				'facebook_url'=>'https://www.facebook.com',
				'instagram_url'=>'https://www.instagram.com',
				'telegram_url'=>'https://www.telegram.com'
			]);
		}
	}
