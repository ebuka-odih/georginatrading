<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    protected $guarded = [];

    public function status()
    {
        if ($this->status == 0){
            return "<span class='badge bg-danger text text-uppercase'>Pending</span>";
        }elseif ($this->status == 1){
            return "<span class='badge bg-success text text-uppercase'>Successful</span>";
        }else{
            return "<span class='badge bg-warning text text-uppercase'>Canceled</span>";
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function investment_plans()
    {
        return $this->belongsTo(InvestmentPlan::class);
    }

}
