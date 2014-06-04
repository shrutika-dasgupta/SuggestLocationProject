<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *(Make Changes to the database)
	 * @return void
	 */
	public function up()
	{
		Schema::create('authors',function($table){
			$table->increments('id');
			$table->string('name');
			$table->text('bio');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *(revert the changes made to the database)
	 * @return void
	 */
	public function down()
	{
		Schema::drop('authors');
	}

}
