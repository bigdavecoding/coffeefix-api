<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ActivityController extends BaseController {

        public static function getMonthlyActivity($year, $month = ''){
            $list = CoffeeActivity::getMonthlyActivity($year, $month);
            return Response::json($list);
        }

        public static function getDailyActivity($year, $month = '', $day = ''){
            $list = CoffeeActivity::getDailyActivity($year, $month, $day);
            return Response::json($list);
        }
        
        public static function postActivity()
        {
            $coffee_activity = new CoffeeActivity();
            $coffee_activity->user_id = strtoupper(Auth::user()->username);
            $coffee_activity->added_on = date('Y-m-d H:i:s');
            $coffee_activity->save();
            return Response::json($coffee_activity);            
        }
}
