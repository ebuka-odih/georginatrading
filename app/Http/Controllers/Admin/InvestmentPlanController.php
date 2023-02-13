<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InvestmentPlan;
use Illuminate\Http\Request;

class InvestmentPlanController extends Controller
{



    public function index()
    {
        $invest_plans = InvestmentPlan::all();
        return view('admin.add-package', compact('invest_plans'));
    }


    public function create()
    {
        //
        $invest_plans = InvestmentPlan::all();
        return view('admin.add-package', compact('invest_plans'));

    }


    public function store(Request $request)
    {

        $data = $this->getData($request);
        InvestmentPlan::create($data);
        return redirect()->route('admin.package.index')
            ->with('success_message', 'Investment Plan created successfully.');
    }


    public function show(InvestmentPlan $investmentPlan)
    {

    }


    public function edit($id)
    {
        $investplan = InvestmentPlan::findOrFail($id);
        return view('admin.edit-investplan', compact('investplan'));
    }


    public function update(Request $request, $id)
    {
        $investplan = InvestmentPlan::findOrfail($id);
        $request->validate([
            'name' => 'nullable',
            'daily_interest' => 'nullable',
            'term_days' => 'required',
            'min_deposit' => 'required',
            'max_deposit' => 'required',

//            'total_return' => 'nullable',
        ]);

        $investplan->update($request->all());
        return redirect()->route('investment-plans.index')->with('success', 'Investment Plan Updated successfully');
    }


    public function destroy($id)
    {
        $investplan = InvestmentPlan::findOrFail($id);
        $investplan->delete();
        return redirect()->back()
            ->with('success_destroy', 'Investment Plan deleted successfully');
    }

    protected function getData(Request $request){
        $rules = [
            'name' => 'required',
            'daily_interest' => 'required',
            'term_days' => 'required',
            'min_deposit' => 'required',
            'max_deposit' => 'required',
//            'total_return' => 'nullable',
        ];
        return $request->validate($rules);
    }

}
