<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::where('admin', 0)->get();
        return view('admin.index', compact('users'));
    }

    public function users()
    {
        $users = User::where('admin', 0)->get();
        return view('admin.users', compact('users'));
    }
    public function userDetails($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-details', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function debit(Request $request)
    {
        $id = $request->user_id;
        $user = User::findOrFail($id);
        $user->acct_bal -= $request->amount;
        $user->save();
        return redirect()->back();
    }
    public function fund(Request $request)
    {
        $id = $request->user_id;
        $user = User::findOrFail($id);
        $user->acct_bal += $request->amount;
        $user->save();
        return redirect()->back();

    }
}
