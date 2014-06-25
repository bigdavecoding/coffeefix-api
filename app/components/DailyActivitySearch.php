<?php


class DailyActivitySearch extends ActivitySearchAbstract
{
    protected $table = 'activity_daily_view';

    protected function setFilters() {
        $this->user_id = $this->filter->getUserId();
        $this->year = $this->filter->getYear();
        $this->month = $this->filter->getMonth();
        $this->day = $this->filter->getDay();
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
}