<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRestro extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('restro_list')->insert(array(
			'name'=>'Sarvana Bhavan',
			'location'=>'500 West 123rd Street'
			));

		DB::table('restro_list')->insert(array(
			'name'=>'Bhatti',
			'location'=>'567 West 23rd Street'
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('restro_list')->where('name','=','Saravana Bhavan')->delete();
		DB::table('restro_list')->where('name','=','Bhatti')->delete();
	}

}
