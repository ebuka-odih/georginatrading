<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'pages.index')->name('index');
Route::view('/about', 'pages.about')->name('about');
Route::view('/commitments', 'pages.commitments')->name('commitments');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
include 'admin.php';


Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function(){

    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::get('edit-profile', 'UserController@edit_profile')->name('edit_profile');
    Route::patch('edit-profile', 'UserController@update_profile')->name('update_profile');
    Route::post('update-password', 'UserController@update_password')->name('update_password');

    Route::get('withdrawal', 'WithdrawalController@withdraw')->name('withdraw');
    Route::post('process-withdraw', 'WithdrawalController@process_withdraw')->name('process_withdraw');
    Route::get('withdrawal/history', 'WithdrawController@create')->name('user_withdrawal');
    Route::post('withdraw-fund/store', 'WithdrawController@store')->name('user_withdraw.store');

    Route::get('deposit', 'DepositController@deposit')->name('deposit');
    Route::post('process/deposit', 'DepositController@make_deposit')->name('make_deposit');
    Route::get('make-payment/{id}', 'DepositController@payment')->name('payment');
    Route::get('process-payment/{id}', 'DepositController@process_payment')->name('process_payment');
//    Route::get('deposit/{slug}/fund', 'DepositController@plan_details')->name('plan_details');
    Route::get('transactionXAIR3{id}x$532xz', 'DepositController@deposit_details')->name('user_deposits.view');

//    Invest Route
    Route::get('invest', "InvestController@invest")->name('invest');
    Route::post('process-invest', "InvestController@process_invest")->name('process_invest');

    Route::post('deposit/fund/','DepositController@make_deposit')->name('deposit.store');
    Route::get('deposit-history', 'DepositController@deposit_history')->name('user_deposit_list');
    Route::get('my-plans', 'DepositController@my_plans')->name('user_plans');


});


