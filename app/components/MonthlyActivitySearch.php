<?php

class MonthlyActivitySearch extends ActivitySearchAbstract
{
    protected $table = 'activity_monthly_view';
    
    protected function setFilters() {
        $this->user_id = $this->filter->getUserId();
        $this->year = $this->filter->getYear();
        $this->month = $this->filter->getMonth();
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
        
}