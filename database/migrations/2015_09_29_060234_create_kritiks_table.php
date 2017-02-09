<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKritiksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kritiks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('email');
			$table->enum('pilihan', ['Kritik','Saran']);
			$table->string('isi');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kritiks');
	}

}
