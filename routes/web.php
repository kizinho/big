<?php

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
Route::post('sign-up', 'UserController@register');
Route::get('/', 'FrontController@index')->name('index');
Route::get('about-us', function () {
    return view('pages.about');
});
Route::get('faq', function () {
    return view('pages.faq');
});
Route::get('terms-condition', function () {
    return view('pages.terms-condition');
});
Route::get('privacy-policy', function () {
    return view('pages.privacy-policy');
});
Route::get('banners', function () {
    return view('pages.banners');
});
Route::get('support', function () {
    return view('pages.contact-us');
});
//cron job
Route::get('cron', 'CronJobController@index')->name('cron');
Route::get('auto-deposit', 'CronJobController@autoDeposit')->name('auto-deposit');
Route::get('auto-withdraw', 'CronJobController@autoWithdraw')->name('auto-withdraw');


Route::get('plan', 'FrontController@plan')->name('plan');
Route::post('contact', 'FrontController@contact');
Route::post('sub', 'FrontController@sub');
Route::get('download-finra-cert/{slug}', 'FileController@downloadFinra')->name('download-finra-cert');
Route::get('download-sec-cert/{slug}', 'FileController@downloadSec')->name('download-sec-cert');
Auth::routes();
Route::get('btc-coin-ipn', ['as' => 'ipn.coinPay', 'uses' => 'HomeController@btcCoinIPN']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/success', 'HomeController@success')->name('success');
Route::get('/deposit', 'HomeController@deposit')->name('deposit');
Route::post('/deposit', 'HomeController@createDeposit');
Route::get('/get-plan', 'HomeController@getPlan')->name('get-plan');
Route::get('/get-coin', 'HomeController@getCoin')->name('get-coin');
//withdraw
Route::get('/withdraw', 'HomeController@withdraw')->name('withdraw');
Route::post('/withdraw', 'HomeController@withdrawPost');
Route::post('/withdraw-fund', 'HomeController@withdrawFund')->name('withdraw-fund');
//deposit list
Route::get('/deposit_list', 'HomeController@depositList')->name('deposit_list');
Route::get('/deposit_history', 'HomeController@depositHistory')->name('deposit_history');
Route::post('/get_history', 'HomeController@getHistory')->name('get_history');
//withdraw history
Route::get('/withdraw_history', 'HomeController@withdrawHistory')->name('withdraw_history');

Route::get('/earnings', 'HomeController@earnings')->name('earnings');
Route::get('/referals', 'HomeController@referals')->name('referals');
Route::get('/referallinks', 'HomeController@referalsLink')->name('referallinks');
Route::get('/edit_account', 'HomeController@edit')->name('edit_account');
Route::get('/edit-account', 'HomeController@edit')->name('edit-account');
Route::post('/edit_account', 'HomeController@editPost');

//adimn
Route::group(['middleware' => 'can:isAdmin'], function () {
	 Route::get('/mailing', 'AdminController@mailing')->name('mailing');
    Route::post('/mailing', 'AdminController@mailingPost');
    //settigs
    Route::get('/settings', 'AdminController@setting')->name('settings');
    Route::post('/settings', 'AdminController@settingPost');
//users
    Route::get('/users', 'AdminController@users')->name('users');
    Route::post('add-user', 'AdminController@create');
    Route::post('edit-user', 'AdminController@edit')->name('edit-user');
    Route::post('delete-user', 'AdminController@delete')->name('delete-user');
    Route::get('view-user/{id}', 'AdminController@viewUser')->name('view-user');
    Route::get('user-login/{id}', 'AdminController@login')->name('user-login');

//deposit
    Route::get('/manage-deposit', 'AdminController@deposit')->name('manage-deposit');
    Route::post('/delete-deposit', 'AdminController@deleteDeposit')->name('delete-deposit');
    Route::post('/confirm-deposit', 'AdminController@confirm')->name('confirm-deposit');
//withdraw
    Route::get('/manage-withdraw', 'AdminController@withdraw')->name('manage-withdraw');
    Route::post('/delete-withdraw', 'AdminController@deleteWithdraw')->name('delete-withdraw');
    Route::post('/confirm-withdraw', 'AdminController@confirmWithdraw')->name('confirm-withdraw');
    Route::post('/reject-withdraw', 'AdminController@rejectWithdraw')->name('reject-withdraw');
//plan
    Route::get('/plan-setting', 'AdminController@planSetting')->name('plan-setting');
    Route::post('/delete-plan', 'AdminController@deletePlan')->name('delete-plan');
    Route::post('/edit-plan', 'AdminController@editPlan')->name('edit-plan');
    Route::post('/add-plan', 'AdminController@addPlan')->name('add-plan');
//compound
    Route::get('/compound-setting', 'AdminController@compoundSetting')->name('compound-setting');
    Route::post('/delete-compound', 'AdminController@deleteCompound')->name('delete-compound');
    Route::post('/edit-compound', 'AdminController@editCompound')->name('edit-compound');
    Route::post('/add-compound', 'AdminController@addCompound')->name('add-compound');
    //coin setting
    Route::get('/coin-setting', 'AdminController@coinSetting')->name('coin-setting');
    Route::post('/delete-coin', 'AdminController@deleteCoin')->name('delete-coin');
    Route::post('/edit-coin', 'AdminController@editCoin')->name('edit-coin');
    Route::post('/add-coin', 'AdminController@addCoin')->name('add-coin');
    //fund
    Route::post('/fund', 'AdminController@fund')->name('fund');
});
