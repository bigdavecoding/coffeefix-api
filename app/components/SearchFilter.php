<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SearchFilter implements SearchFilterInterface
{
   private $year;
   private $month;
   private $day;
   private $user_id;
   
   function __construct($user_id, $year = '', $month = '', $day = '') {
       $this->user_id = $user_id;
       $this->year = $year;
       $this->month = $month;
       $this->day = $day;
   }
   
   public function getYear(){
       return $this->year;
   }

   public function getMonth(){
       return $this->month;
   }
   
   public function getDay(){
       return $this->day;
   }   
   
   public function getUserId(){
       return $this->user_id;
   }
}