<?php

class MonthlyActivitySearch extends ActivitySearch
{
    protected $table = 'activity_monthly_view';
    private $year;
    private $month;
    private $user_id;
    
    public function __construct($user_id, $year, $month = '') {
        $this->user_id = $user_id;
        $this->year = $year;
        $this->month = $month;
    }
    
    public function getActivity() {        
        $query = DB::Table($this->table);
        $query->where('user_id', '=', $this->user_id);
        $query->where('year', '=', $this->year);
        if ($this->month != ''){
            $query->where('month', '=', $this->month);
        }
        return $query->get();
        
    }
   
    public function getMonth(){
        return $this->month;
    }
    
    public function getYear(){
        return $this->year;
    }
    
    public function getUserId() {
        return $this->user_id;
    }
        
}