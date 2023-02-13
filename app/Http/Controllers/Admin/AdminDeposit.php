<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Notifications\ApproveDeposit;
use App\User;
use Illuminate\Http\Request;

class AdminDeposit extends Controller
{
    public function deposits()
    {
        $deposits = Deposit::all();
        return view('admin.deposits', compact('deposits'));
    }

    public function approve_deposit($id)
    {
        $deposit = Deposit::findOrFail($id);
        $user = User::findOrFail($deposit->user_id);
        $deposit->status = 1;
        $user->acct_bal += $deposit->amount;
        $user->save();
        $deposit->save();
        $user->notify(new ApproveDeposit($deposit));
        return redirect()->back();

    }



}
