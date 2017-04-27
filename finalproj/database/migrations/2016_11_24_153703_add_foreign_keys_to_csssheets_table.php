<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCssSheetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('csssheets', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_css_user1')->references('id')->on('users')->onUpdate('cascade')->onDelete('NO ACTION');
			$table->foreign('updated_by', 'fk_css_user2')->references('id')->on('users')->onUpdate('cascade')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('csssheets', function(Blueprint $table)
		{
			$table->dropForeign('fk_css_user1');
			$table->dropForeign('fk_css_user2');
		});
	}

}
