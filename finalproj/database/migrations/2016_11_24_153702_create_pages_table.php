<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id'); //switched this from integer ([column name], true)
			$table->string('page_name', 45);
			$table->string('page_alias', 12);
			$table->string('page_desc');
			$table->timestamps();
			$table->integer('created_by')->unsigned(); //->index('fk_user_idx');
			$table->integer('updated_by')->unsigned()->nullable();;
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
