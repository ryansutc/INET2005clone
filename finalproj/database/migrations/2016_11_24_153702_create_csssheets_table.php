<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;

class CreateCssSheetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('csssheets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('css_name', 45);
			$table->string('css_desc'); //string unlimited size
            $table->string('css_text', 10000);
			$table->boolean('css_state')->nullable()->default(false);
			$table->timestamps();
			$table->integer('created_by')->unsigned();
			$table->integer('updated_by')->unsigned()->nullable();; //->index('fk_css_user2_idx');
			//$table->index(['created_by','updated_by'], 'fk_css_user1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('csssheets');
	}

}
