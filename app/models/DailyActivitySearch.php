<?php


class DailyActivitySearch extends ActivitySearch
{
    protected $table = 'activity_daily_view';
    private $year;
    private $month;
    private $day;
    private $user_id;
    
    public function __construct($user_id, $year, $month = '', $day = '') {
        $this->user_id = $user_id;
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }
    
    public function getActivity() {        
        $query = DB::Table($this->table);
        $query->where('user_id', '=', $this->user_id);
        $query->where('year', '=', $this->year);
        if ($this->month != ''){
            $query->where('month', '=', $this->month);
        }
        if ($this->day != ''){
            $query->where('day', '=', $this->day);
        }
        return $query->get();
        
    }

    public function getDay(){
        return $this->day;
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