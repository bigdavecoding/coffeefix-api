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

    
}
