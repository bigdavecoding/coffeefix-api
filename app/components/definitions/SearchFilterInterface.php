<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface SearchFilterInterface
{
    public function getYear();
    public function getMonth();
    public function getDay();
    public function getUserId();
}