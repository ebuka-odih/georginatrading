<?php

namespace App;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Deposit extends Model
{
    protected $guarded = [];
//    protected $appends = ['end_date', 'total_earned', 'earning', 'trans'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, "payment_method_id");
    }

    public function investment_plan()
    {
        return $this->belongsTo(InvestmentPlan::class, 'investment_plans_id');
    }


    public function getTotalEarnedAttribute(){
      return  $this->earning + $this->amount;

    }

    public function TotalEarned()
    {
        $total_profit = $this->earning;
        return $total_profit;
    }

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

    public function getTransAttribute()
    {
        $trans_id = (string) Str::uuid();

        if (strlen($trans_id) >= 15) {
            return substr($trans_id, 0, 10). "#" . substr($trans_id, -5);
        }
        else {
            return "#".$trans_id;
        }
//        return "#".$trans_id;
    }

    public function total_earned(){
        return  $this->earning + $this->amount;

    }

    public function expected_profit()
    {
        $expected_profit = $this->investment_plan->total_return() * $this->amount;
        $profit =  number_format((float)$expected_profit / 100, 2, '.', '');
        return $profit;
    }

    public function ending_date()
    {
        $date = Carbon::parse($this->approved_date);
        return $date->addDays($this->investment_plan->term_days - 1);
//        return $date + $this->investment_plan->term_days;
    }


}
