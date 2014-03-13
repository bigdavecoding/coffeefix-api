<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CoffeeActivity extends Eloquent
{
    protected $table = 'activity';
    public $timestamps = false;
    
    /**
     * @param int $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public static function getActivity($id='')
    {
        if ($id == ''){
            $activity_list = CoffeeActivity::all();
        }
        else{
            $activity_list = CoffeeActivity::find($id);
        }
        return $activity_list;
    }

    public static function getMonthlyActivity()
    {
        $sql = "
        SELECT date_part('year', added_on) AS year
        , date_part('month', added_on) AS month
        , count(*) AS num_activity
          FROM activity
        GROUP BY month, year
        ORDER BY year desc, month desc"
        ;
    
        $activity_list = DB::select( DB::raw($sql));
        return $activity_list;
    }    

    public static function getDailyActivity()
    {
        $sql = "
        SELECT date_part('year', added_on) AS year
        , date_part('month', added_on) AS month
        , date_part('day', added_on) AS day
        , count(*) AS num_activity
          FROM activity
        GROUP BY year, month, day
        ORDER BY year desc, month desc, day desc"
        ;
    
        $activity_list = DB::select( DB::raw($sql));
        return $activity_list;
    }       
}
