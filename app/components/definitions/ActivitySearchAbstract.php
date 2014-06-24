<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


abstract class ActivitySearchAbstract extends Eloquent
{
    protected $filter;
    
    function __construct(SearchFilterInterface $filter){
        $this->filter = $filter;
    }
    
    abstract protected function getActivity();
}