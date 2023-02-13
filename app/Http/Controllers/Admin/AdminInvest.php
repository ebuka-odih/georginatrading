<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invest;
use App\Notifications\ApproveInvest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class AdminInvest extends Controller
{
    public function invest()
    {
        $invest = Invest::all();
        return view('admin.invest', compact('invest'));
    }

    public function approve_invest($id)
    {
        $invest = Invest::findOrFail($id);
        $user = User::findOrFail($invest->user_id);
        $invest->status = 1;
        $user->acct_bal -= $invest->amount;
        $invest->save();
        $user->save();
        $user->notify(new ApproveInvest($invest));
        return redirect()->back();
    }

    public function delete($id)
    {
        $invest = Invest::findOrFail($id);
        $invest->delete();
        return redirect()->back();
    }

}
