<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ActivityController extends BaseController {

        public static function getActivity(){
            $user_id = Auth::user()->username;
            $year = Input::get('year');
            $month = Input::get('month');
            $day = Input::get('day');
            $groupby = Input::get('groupby');
            
            switch($groupby){
                case 'month':
                    $search = new MonthlyActivitySearch($user_id, $year, $month);
                    break;
                default:
                    $search = new DailyActivitySearch($user_id, $year, $month, $day);
            }
            
            return Response::json($search->getActivity());
        }
        
        public static function postActivity(){
            $user_id = strtoupper(Auth::user()->username);
            $add_timestamp = date('Y-m-d H:i:s');
            
            $activity = new ActivityRecord($user_id, $add_timestamp);
            $activity->save();
            return Response::json($activity);
        }
}
