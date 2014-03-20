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

    public static function getMonthlyActivity($year, $month='')
    {
        $sql_parm = array();
        $sql_parm['year'] = $year;
        
        $sql_and_month = '';
        if ($month != ''){
            $sql_and_month = "AND date_part('month', added_on) = :month";
            $sql_parm['month'] = $month;
        }
        
        $sql = "
        SELECT date_part('year', added_on) AS year
        , date_part('month', added_on) AS month
        , count(*) AS num_activity
          FROM activity
        WHERE date_part('year', added_on) = :year
        $sql_and_month
        GROUP BY month, year
        ORDER BY year desc, month desc"
        ;
    
        $activity_list = DB::select(DB::raw($sql), $sql_parm);
        return $activity_list;
    }    

    public static function getDailyActivity($year, $month='', $day='')
    {
        $sql_parm = array();
        $sql_parm['year'] = $year;
        
        $sql_and_month = '';
        if ($month != ''){
            $sql_and_month = "AND date_part('month', added_on) = :month";
            $sql_parm['month'] = $month;
        }
        
        $sql_and_day = '';
        if($day != ''){
            $sql_and_day = "AND date_part('day', added_on) = :day";
            $sql_parm['day'] = $day;
        }
        
        $sql = "
        SELECT date_part('year', added_on) AS year
        , date_part('month', added_on) AS month
        , date_part('day', added_on) AS day
        , count(*) AS num_activity
          FROM activity
        WHERE date_part('year', added_on) = :year
        $sql_and_month
        $sql_and_day
        GROUP BY year, month, day
        ORDER BY year desc, month desc, day desc"
        ;
    
        $activity_list = DB::select( DB::raw($sql), $sql_parm);
        return $activity_list;
    }       
}
