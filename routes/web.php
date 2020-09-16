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

//User Routes
Route::namespace('User')->group(function (){
    Route::get('/login','AuthController@showLogin')->name('user.login');
    Route::post('/login','AuthController@login');
    Route::get('/signup','AuthController@showSignup')->name('user.signup');
    Route::post('/signup','AuthController@signup');
    Route::get('/logout','AuthController@userLogout')->name('user.logout');
    Route::get('/','MainController@index')->name('user.home');
    Route::get('/sell-dollar','MainController@showSell')->name('user.sell');
    Route::get('/buy-dollar','MainController@showBuy')->name('user.buy');
    Route::get('/dollar-sell-rate','MainController@fetchDollarSellRate')->name('user.dollarSellRate');
    Route::get('/dollar-buy-rate','MainController@fetchDollarBuyRate')->name('user.dollarBuyRate');
    Route::post('/sell-transaction','MainController@sellTransaction')->name('user.sellTransaction');
    Route::post('/buy-transaction','MainController@buyTransaction')->name('user.buyTransaction');


});

//Admin Routes
Route::prefix('admin')->group(function (){
    Route::namespace('Admin')->group(function (){
        Route::get('/login','AuthController@showLogin')->name('admin.login');
        Route::post('/login','AuthController@login');
        Route::get('/logout','AuthController@logout')->name('admin.logout');

        Route::get('/dashboard','MainController@dashboard')->name('admin.dashboard');
        Route::get('/dollar-rate','MainController@dollarRate')->name('admin.rate');

        Route::get('/method-list','MethodController@showMethod')->name('admin.showMethod');
        Route::get('/method','MethodController@showAddMethod')->name('admin.addMethod');
        Route::post('/method','MethodController@addMethod');
        Route::get('/method/{name}','MethodController@showUpdateMethod')->name('admin.showUpdateMethod');
        Route::put('/method-update/{id}','MethodController@updateMethod')->name('admin.updateMethod');
        Route::delete('/method-delete/{id}','MethodController@deleteMethod')->name('admin.deleteMethod');

        Route::get('/dollar-sell-rate','RateController@showSellRate')->name('admin.sellRate');
        Route::get('/dollar-buy-rate','RateController@showBuyRate')->name('admin.buyRate');
        Route::post('/add-sell-rate','RateController@addSellRate')->name('admin.addSellRate');
        Route::post('/add-buy-rate','RateController@addBuyRate')->name('admin.addBuyRate');
        Route::delete('/delete-sell-rate/{id}','RateController@deleteSellRate')->name('admin.deleteSellRate');
        Route::delete('/delete-buy-rate/{id}','RateController@deleteBuyRate')->name('admin.deleteBuyRate');
        Route::get('/buy-rate/{id}','RateController@showUpdateBuyRate')->name('admin.showBuyRate');
        Route::put('/update-buy-rate/{id}','RateController@updateBuyRate')->name('admin.updateBuyRate');
        Route::get('/sell-rate/{id}','RateController@showUpdateSellRate')->name('admin.showSellRate');
        Route::put('/update-sell-rate/{id}','RateController@updateSellRate')->name('admin.updateSellRate');

        Route::get('/transaction','TransactionController@showTransaction')->name('admin.showTransaction');
        Route::get('/fetch-transaction','TransactionController@transactionFetch')->name('admin.transactionFetch');
    });
});
