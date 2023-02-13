<?php

namespace App\Http\Controllers;

use App\Notifications\AdminWithdrawNotify;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function withdraw()
    {
        $withdrawal = Withdraw::whereUserId(auth()->id())->paginate(10);
        return view('dashboard.withdraw', compact('withdrawal'));
    }

    public function process_withdraw(Request $request)
    {
        if (\auth()->user()->acct_bal < $request->amount){
            return redirect()->back()->with('declined', "Insufficient Fund");
        }
        $with = new Withdraw();
        $with->amount = $request->get('amount');
        $with->wallet_type = $request->get('wallet_type');
        $with->user_id = Auth::id();
        $with->save();
        $admin = User::where('admin', 1)->first();
        $admin->notify(new AdminWithdrawNotify($with));
        return redirect()->back()->with('success', "Withdrawal Request Sent");
    }
}
