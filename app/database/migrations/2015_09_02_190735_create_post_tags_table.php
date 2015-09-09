<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_tags', function(Blueprint $table)
		{
			$table->integer('post_id')->unsigned();
			$table->integer('tag_id')->unsigned();

			$table->foreign('post_id')->references('id')->on('posts');
			$table->foreign('tag_id')->references('id')->on('tags');

			$table->primary(['post_id', 'tag_id']);

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

		Schema::table('post_tags', function(Blueprint $table) {
			$table->dropForeign('post_tags_post_id_foreign');
			$table->dropForeign('post_tags_tag_id_foreign');
		});

		Schema::drop('post_tags');
	}

}
