<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Http\Controllers\Admin\AdminDeposit;
use App\InvestmentPlan;
use App\PaymentMethod;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class DepositController extends Controller
{

    public function deposit()
    {
        $wallets = PaymentMethod::all();
        $deposits = Deposit::whereUserId(auth()->id())->paginate(5);
        return view('dashboard.deposit', compact('wallets', 'deposits'));
    }
    public function make_deposit(Request $request)
    {
        $deposit = new Deposit();
        $deposit->amount = $request->input('amount');
        $deposit->payment_method_id = $request->input('payment_method_id');
        $deposit->hash_code = (string)Str::uuid();
        $deposit->user_id = auth()->id();
        $deposit->save();
        return redirect()->back()->with('success', "Deposit Initiated");
    }

    public function payment($id){

        $deposit = Deposit::findOrFail($id);
        return view('dashboard.payment', compact('deposit'));
    }

    public function process_payment($id)
    {
        $deposit = Deposit::findOrFail($id);
        $admin = User::where('admin', 1)->first();
        $admin->notify(new \App\Notifications\AdminDeposit($deposit));
//        Notification::send("admin@geodcapitalinvest.com", new \App\Notifications\AdminDeposit($deposit));
        return redirect()->route('user.dashboard');
    }

    public function plans()
    {
        $deposits = Deposit::latest()->paginate(10);
        return view('dashboard.deposit-plans', compact('deposits'));
    }



    public function process_deposit(Request $request)
    {
        $id = $request->payment_proof_id;
        if ($request->hasFile('payment_proof')) {
            $fileNameWithExt = $request->file('payment_proof')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store the image
            $path = $request->file('payment_proof')->storeAs('public/payment-proof/', $fileNameToStore);
        }else {
            $fileNameToStore = ' Noimage';
        }

        $payment_image = Deposit::findOrfail($id);
        if($fileNameToStore){
            $payment_image->update(['payment_proof' => $fileNameToStore]);
        }
        return redirect()->back()->with('success_message', 'Submitted, Proof of Payment awaiting confirmation');

    }

    public function deposit_history()
    {
        $deposit_history = Deposit::whereUserId(auth()->id())->get();
        $total           = Deposit::whereUserId(auth()->id())->select('amount')->sum('amount');
        $approved_cash   = Deposit::whereUserId(auth()->id())->select('amount')->where('status', '=', 'approved')->sum('amount');
        $pending_cash    = Deposit::whereUserId(auth()->id())->select('amount')->where('status', '=', 'pending')->sum('amount');
        return view('dashboard2.deposits', compact('deposit_history', 'total', 'approved_cash', 'pending_cash'));
    }



}
