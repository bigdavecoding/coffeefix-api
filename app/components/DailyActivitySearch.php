<?php


class DailyActivitySearch extends ActivitySearch
{
    protected $table = 'activity_daily_view';

    public function getActivity() {        
        $query = DB::Table($this->table);
        $query->where('user_id', '=', $this->filter->getUserId());
        $query->where('year', '=', $this->filter->getYear());
        if ($this->filter->getMonth() != ''){
            $query->where('month', '=', $this->filter->getMonth());
        }
        if ($this->filter->getDay() != ''){
            $query->where('day', '=', $this->filter->getDay());
        }
        return $query->get();
        
    }        
}