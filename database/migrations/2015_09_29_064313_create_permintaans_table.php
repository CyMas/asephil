<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permintaans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('nama_nasabah');
			$table->string('no_rek');
			$table->enum('jenis_rek', ['BCA','Mandiri']);
			$table->string('alamat');
			$table->string('penerima_faedah');
			$table->integer('jml_permintaan');
			$table->enum('status', ['Proses','Terkirim']);
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
		Schema::drop('permintaans');
	}

}
