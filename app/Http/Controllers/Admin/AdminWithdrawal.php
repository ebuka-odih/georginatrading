<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\AdminWithdrawNotify;
use App\Notifications\ApproveWithdrawal;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;

class AdminWithdrawal extends Controller
{
    public function withdrawal()
    {
        $withdrawal = Withdraw::all();
        return view('admin.withdrawal', compact('withdrawal'));
    }

    public function approve_withdraw($id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        $withdrawal->status = 1;
        $withdrawal->save();
        $user = User::findOrFail($withdrawal->user_id);
        $user->notify(new ApproveWithdrawal($withdrawal));
        return redirect()->back();
    }

    public function delete_withdrawal($id)
    {
        $with = Withdraw::findOrFail($id);
        $with->delete();
        return redirect()->back();
    }


}
