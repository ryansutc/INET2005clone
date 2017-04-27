<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    //http://stackoverflow.com/questions/7047624/remove-foreign-key-relationships-from-all-tables
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('art_name', 45);
			$table->string('art_title', 100);
			$table->string('art_desc')->nullable();
			$table->boolean('all_pages')->nullable();
			$table->integer('page_id')->unsigned()->nullable(); //->index('fk_article_page_idx');
			$table->integer('cont_id')->nullable();
			$table->text('art_text')->nullable();
			$table->timestamps();
			$table->integer('created_by')->unsigned();
			$table->integer('updated_by')->unsigned()->nullable(); //->index('fk_article_user2_idx');
			$table->index(['created_by','updated_by'], 'fk_article_user_idx');
		});

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('articles');



	}

}
