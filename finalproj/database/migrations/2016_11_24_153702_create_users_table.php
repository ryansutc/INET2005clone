<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->increments('id'); //primary key (id is PK by eloquent standards
			$table->string('name', 45)->unique('user_name_UNIQUE');
			$table->string('email', 45)->unique('email_UNIQUE');
			$table->string('password', 125);
			$table->timestamps();
			$table->string('remember_token', 100)->nullable();
            $table->softDeletes(); //[todo] need to fully implement this in CRUD
		});
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
