<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Withdraw extends Model
{
    //
    protected $guarded = [];
    protected $appends = 'trans';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function investment()
    {
        return $this->belongsTo(User::class);
    }

    public function getTransAttribute()
    {
        $trans_id = (string) Str::uuid();

        if (strlen($trans_id) >= 15) {
            $short_s = substr($trans_id, 0, 10).substr($trans_id, -5);
            return "#".$short_s;
        }
        else {
            return "#".$trans_id;
        }
//        return "#".$trans_id;
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
    public function admin_status()
    {
        if ($this->status == "pending"){
            return "<span class='badge badge-warning text text-uppercase'>Pending</span>";
        }elseif ($this->status == 'approved'){
            return "<span class='badge badge-success text text-uppercase'>Successful</span>";
        }else{
            return "<span class='badge badge-danger text text-uppercase'>Canceled</span>";
        }
    }
    public function wallet_type()
    {
        if ($this->wallet_type == 'acct_wallet'){
            return "Main Wallet";
        }
        return "Bonus Wallet";
    }
    public function admin_wallet_type()
    {
        if ($this->wallet_type == 'acct_wallet'){
            return "Main Wallet |"." $".$this->users->acct_wallet;
        }
        return "Bonus Wallet |"." $".$this->users->bonus_wallet;
    }

}
