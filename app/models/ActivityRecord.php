<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ActivityRecord extends Eloquent
{
    protected $table = 'activity';   
    public $timestamps = false;
    
    public function __construct($user_id, $timestamp) {
        $this->user_id = $user_id;
        $this->added_on = $timestamp;
    }
}
