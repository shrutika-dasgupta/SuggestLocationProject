<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Schema: to create tables
		//Fluent builder: insert, delete, update data, retrieving data(query)
		DB::table('authors')->insert(array(
			'name'=>'Shrutika Dasgupta',
			'bio'=>'Shrutika is an amazing author',
			'created_at'=>date('T-,m-d H:m:s'),
			'updated_at'=>date('T-,m-d H:m:s'),
		));

		DB::table('authors')->insert(array(
			'name'=>'Masumi Dasgupta',
			'bio'=>'Masumi is an amazing author as well',
			'created_at'=>date('T-,m-d H:m:s'),
			'updated_at'=>date('T-,m-d H:m:s'),
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('authors')->where('name','=','Shrutika Dasgupta')->delete();
		DB::table('authors')->where('name','=','Masumi Dasgupta')->delete();
	}

}
