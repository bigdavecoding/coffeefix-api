<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivityYearlyView extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::Statement("
                CREATE OR REPLACE VIEW coffeefix.activity_yearly_view 
                (user_id, year, num_activity) AS
                SELECT activity.user_id, 
                date_part('year'::text, activity.added_on) AS year, 
                count(*) AS num_activity
                FROM coffeefix.activity
                GROUP BY activity.user_id, 
                date_part('year'::text, activity.added_on)
                ORDER BY activity.user_id, 
                date_part('year'::text, activity.added_on) DESC;
             ");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::Statement("DROP View coffeefix.activity_yearly_view");
	}

}
