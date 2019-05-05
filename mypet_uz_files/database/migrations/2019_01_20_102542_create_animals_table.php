<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateAnimalsTable extends Migration{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up(){
			Schema::create('animals', function(Blueprint $table){
				$table->increments('id');
				$table->string('title');
				$table->string('image')->default('default.png');
				$table->text('description')->nullable(true);
				$table->integer('price')->default(0);
				$table->boolean('is_best')->default(false);
				$table->boolean('is_gifted')->default(false);
				$table->boolean('is_bird')->default(0);
				$table->boolean('is_reptile')->default(0);
				$table->boolean('is_fish')->default(0);
				$table->boolean('is_rodent')->default(0); // грызун
				$table->boolean('is_insect')->default(0);
				$table->boolean('is_aquarium')->default(0);
				$table->boolean('is_caged')->default(0);
				$table->boolean('is_food')->default(0);
				$table->boolean('is_others')->default(0);
				$table->timestamps();
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down(){
			Schema::dropIfExists('animals');
		}
	}
