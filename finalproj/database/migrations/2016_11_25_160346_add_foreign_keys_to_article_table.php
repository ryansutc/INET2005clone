<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function(Blueprint $table)
        {
            $table->foreign('page_id', 'fk_article_page')->references('id')->on('pages')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('created_by', 'fk_article_user1')->references('id')->on('users')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('updated_by', 'fk_article_user2')->references('id')->on('users')->onUpdate('cascade')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function(Blueprint $table)
        {
            $table->dropForeign('fk_article_page');
            $table->dropForeign('fk_article_user1');
            $table->dropForeign('fk_article_user2');
        });
    }
}
