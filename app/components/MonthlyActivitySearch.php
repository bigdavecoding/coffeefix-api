<?php

class MonthlyActivitySearch extends ActivitySearchAbstract
{
    protected $table = 'activity_monthly_view';
        
    public function getActivity() {        
        $query = DB::Table($this->table);
        $query->where('user_id', '=', $this->filter->getUserId());
        $query->where('year', '=', $this->filter->getYear());
        if ($this->filter->getMonth() != ''){
            $query->where('month', '=', $this->filter->getMonth());
        }
        return $query->get();
        
    }
        
}