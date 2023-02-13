



<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('dashboard', 'Admin\AdminController@index')->name('dashboard');
    Route::post('debit/user', 'Admin\AdminController@debit')->name('debit');
    Route::post('fund/user', 'Admin\AdminController@fund')->name('fund');
    Route::get('users', 'Admin\AdminController@users')->name('users');
    Route::get('user/details/{id}', 'Admin\AdminController@userDetails')->name('userDetails');
    Route::delete('delete/user', 'Admin\AdminController@deleteUser')->name('deleteUser');

    Route::get('deposits', "Admin\AdminDeposit@deposits")->name('deposits');
    Route::get('approve/deposits/{id}', "Admin\AdminDeposit@approve_deposit")->name('approve_deposit');

    Route::get('withdrawal', "Admin\AdminWithdrawal@withdrawal")->name('withdrawal');
    Route::get('approve/withdrawal/{id}', "Admin\AdminWithdrawal@approve_withdraw")->name('approve_withdraw');
    Route::delete('delete/withdrawal/{id}', "Admin\AdminWithdrawal@delete_withdrawal")->name('delete_withdrawal');

    Route::get('investments', "Admin\AdminInvest@invest")->name('invest');
    Route::get('approve/investments/{id}', "Admin\AdminInvest@approve_invest")->name('approve_invest');
    Route::delete('delete/investments/{id}', "Admin\AdminInvest@delete")->name('invest_delete');

    Route::resource('wallet', "Admin\AdminPaymentMethod");
    Route::resource('package', "Admin\InvestmentPlanController");


});


