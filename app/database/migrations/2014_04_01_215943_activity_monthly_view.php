<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivityMonthlyView extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::Statement("
                CREATE OR REPLACE VIEW coffeefix.activity_monthly_view 
                (user_id, year, month, num_activity) AS
                SELECT activity.user_id, 
                date_part('year'::text, activity.added_on) AS year, 
                date_part('month'::text, activity.added_on) AS month,
                count(*) AS num_activity
                FROM coffeefix.activity
                GROUP BY activity.user_id, 
                date_part('year'::text, activity.added_on),
                date_part('month'::text, activity.added_on)
                ORDER BY activity.user_id, 
                date_part('year'::text, activity.added_on) DESC,
                date_part('month'::text, activity.added_on) DESC;
             ");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::Statement("DROP View coffeefix.activity_monthly_view");
	}

}
