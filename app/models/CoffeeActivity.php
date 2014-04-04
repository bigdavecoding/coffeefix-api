<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CoffeeActivity extends Eloquent
{
    protected $table = 'activity';
    protected static $monthly_view = 'activity_monthly_view';
    protected static $daily_view = 'activity_daily_view';
    
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
        $query = DB::Table(self::$monthly_view);
        $query->where('year', '=', $year);
        if ($month != ''){
            $query->where('month', '=', $month);
        }
        return $query->get();
    }    

    public static function getDailyActivity($year, $month='', $day='')
    {
        $query = DB::Table(self::$daily_view);
        $query->where('year', '=', $year);
        if ($month != ''){
            $query->where('month', '=', $month);
        }
        if ($day != ''){
            $query->where('day', '=', $day);
        }        
        return $query->get();
    }       
}
