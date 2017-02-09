<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('username')->unique();
			$table->string('password', 60);
			$table->enum('type', ['user','admin']);
			$table->enum('jenisKelamin', ['Laki-laki','Perempuan']);
			$table->string('ttl');
			$table->string('alamat');
			$table->string('no_tlp',25);
			$table->rememberToken();
			$table->timestamps();
		});

		$user = new User;
        $user->nama = 'Admin';
        $user->username = 'admin';
        $user->password = \Hash::make('admin123');
        $user->type = 'admin';
        $user->jeniskelamin = 'Laki-laki';
        $user->ttl = 'Jakarta, 17 Agustus 1945';
        $user->alamat = 'Jl. Raya No.13';
        $user->no_tlp = '082311019328';
        $user->save();

        $user = new User;
        $user->nama = 'User';
        $user->username = 'user';
        $user->password = \Hash::make('user123');
        $user->type = 'user';
        $user->jeniskelamin = 'Perempuan';
        $user->ttl = 'Jakarta, 17 Agustus 1945';
        $user->alamat = 'Jl. Raya No.13';
        $user->no_tlp = '082311019328';
        $user->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
