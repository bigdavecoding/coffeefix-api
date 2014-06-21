<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


abstract class ActivitySearch extends Eloquent
{
    abstract protected function getActivity();
    abstract protected function getUserId();
    abstract protected function getYear();
}