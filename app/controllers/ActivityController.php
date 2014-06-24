<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ActivityController extends BaseController {

        protected static function createActivitySearch(){
            $user_id = Auth::user()->username;
            $year = Input::get('year');
            $month = Input::get('month');
            $day = Input::get('day');
            $groupby = Input::get('groupby');
            $filters = new SearchFilter($user_id, $year, $month, $day);

            switch($groupby){
                case 'month':
                    return new MonthlyActivitySearch($filters);
                    break;
                default:
                    return new DailyActivitySearch($filters);
            }            
        }
    
        public static function getActivity(){
            $search = self::createActivitySearch();
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
