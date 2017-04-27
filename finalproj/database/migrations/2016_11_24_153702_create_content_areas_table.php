<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_areas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cont_name', 45);
			$table->string('cont_alias', 45);
			$table->string('cont_desc')->nullable();
			$table->integer('disp_order');
			$table->timestamps();
			$table->integer('created_by')->unsigned(); //->index('fk_content_area_user1_idx');
			$table->integer('updated_by')->unsigned()->nullable();; //->index('fk_content_area_user2_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('content_areas');
	}

}
