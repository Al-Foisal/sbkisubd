<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::post('/api-register',[
    'uses'   => 'Customer\CustomerController@api_storecustomer',
      'as'     => 'api-register'
 ]);
 
  Route::post('/api-customer-login',[
    'uses'   => 'Customer\CustomerController@api_customer_login',
      'as'     => 'api-customer-login'
 ]);
 
  Route::get('/api-customer-editprofile/{id}',[
    'uses'   => 'Customer\CustomerController@api_editprofile',
      'as'     => 'api-customer-editprofile'
 ]);
 
   Route::post('/api-updateprofile',[
    'uses'   => 'Customer\CustomerController@api_updateprofile',
      'as'     => 'api-updateprofile'
 ]);
 
   Route::post('/api-post-new-ads',[
    'uses'   => 'Customer\AdsController@api_adspublished',
      'as'     => 'api-post-new-ads'
 ]);
  Route::get('/all-ads-manege/{id}',[
    'uses'   => 'Customer\AdsController@all_customer_ads',
      'as'     => 'all-ads-manege'
 ]);
   Route::get('/ads-edit/{id}',[
    'uses'   => 'Customer\AdsController@ads_edit',
      'as'     => 'ads-edit'
 ]);
 
 
    Route::post('/api-adsupdate',[
    'uses'   => 'Customer\AdsController@api_adsupdate',
      'as'     => 'api-adsupdate'
 ]);
 
   Route::get('/ads-delete/{id}',[
    'uses'   => 'Customer\AdsController@ads_delete',
      'as'     => 'ads-delete'
 ]);
 
    Route::post('/api-homesearch',[
    'uses'   => 'FrontEnd\FrontEndController@api_homesearch',
      'as'     => 'api-homesearch'
 ]);
 
 