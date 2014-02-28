<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Activity extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity', function($table)
		{
			$table->increments('id');
			$table->string('user_id', 20);
			$table->timestamp('added_on');        
		});
                
                //set the auto increment counter to above value
                $statement = "
                    ALTER SEQUENCE activity_id_seq RESTART WITH 1000;
                ";
                DB::unprepared($statement);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activity');
	}

}
