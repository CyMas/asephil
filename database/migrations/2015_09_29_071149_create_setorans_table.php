<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetoransTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('setorans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('nama_nasabah');
			$table->string('no_rek');
			$table->enum('jenis_rek', ['BCA','Mandiri']);
			$table->integer('jml_setoran');
			$table->enum('status', ['Belum di Kirim','Sudah Terkirim']);
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
		Schema::drop('setorans');
	}

}
