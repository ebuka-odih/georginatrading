<?php

namespace App\Http\Controllers;

use App\Invest;
use App\InvestmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;

class InvestController extends Controller
{
    public function invest()
    {
        $package = InvestmentPlan::all();
        $investment = Invest::whereUserId(\auth()->id())->get();
        return view('dashboard.invest', compact('package', 'investment'));
    }

    public function process_invest(Request $request)
    {
        $invest_plan = InvestmentPlan::findOrFail($request->investment_plans_id);
        $data = $this->getData($request);
        $data['user_id'] = Auth::id();
//        $data['status'] = 1;
        if (\auth()->user()->acct_bal > $request->get('amount'))
        {
            if ($request->input('amount') < $invest_plan->min_deposit || $request->input('amount') > $invest_plan->max_amt())
            {
                return redirect()->back()->with('decline', "Please enter the amount within the Min/Max deposit");
            }else{
                $data['amount'] = $request->amount;
                $data['investment_plans_id'] = $request->investment_plans_id;
                Invest::create($data);
                return redirect()->back()->with('success', "Successful");
            }
        }else{
            return redirect()->back()->with('low_balance', "Insufficient Balance");
        }

//        return redirect()->back()->with('success', "Successful")
    }

    protected function getData(Request $request)
    {
        $rules = [
          'amount' => 'required',
          'investment_plans_id' => 'required',
        ];
    }

}
