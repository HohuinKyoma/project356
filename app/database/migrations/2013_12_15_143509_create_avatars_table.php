<?php

use Illuminate\Database\Migrations\Migration;

class CreateAvatarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avatars', function($table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('type', 20);
			$table->integer('user_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('avatars');
	}

}