<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


abstract class ActivitySearchAbstract extends Eloquent
{
    protected $filter;
    protected $user_id;
    protected $year;
    protected $month;
    protected $day;
    
    function __construct(SearchFilterInterface $filter){
        $this->filter = $filter;
        $this->setFilters();
    }
    
    abstract protected function setFilters();    
    abstract public function getActivity();
}