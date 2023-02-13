<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Rules\MatchOldPassword;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function dashboard()
    {
        $account_bal = Auth::user()->acct_bal;
        $total_dep = Deposit::whereUserId(\auth()->id())->select('amount')->where('status', 1)->sum('amount');
        $total_with = Withdraw::whereUserId(\auth()->id())->select('amount')->where('status', 1)->sum('amount');
        $pending_with = Withdraw::whereUserId(\auth()->id())->select('amount')->where('status', 0)->sum('amount');
        return view('dashboard.index', compact('account_bal', 'total_dep', 'total_with', 'pending_with'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    public function edit_profile()
    {
        $user = User::findOrFail(\auth()->id());
        return view('dashboard.edit-profile', compact('user'));
    }
    public function update_profile(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $data = $this->getData($request);
        $user->update($data);
        return redirect()->back()->with('success', 'Profile Updated Successful');
    }


    protected function getData(Request $request){
        $rules = [
            'name' => 'nullable',
            'email' => 'nullable|email',
            'wallet_address' => 'nullable',
            'country' => 'nullable',
            'phone' => 'nullable',
        ];
        return $request->validate($rules);
    }


    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with('updated', "Password Updated Successfully");
    }

}
