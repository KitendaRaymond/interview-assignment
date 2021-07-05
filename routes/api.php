<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Transaction;
use App\Individual;
use App\Sacco;
use App\Http\Controllers\TransactionsApiController;

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

//The older version of Laravel creates routes like so..

//TRANSACTION API ROUTES
Route::get('/transactions', [
     'as'=>'transactions.index',
     'uses'=>'TransactionsApiController@index'
     ]);

     Route::post('/transactions', [
        'as'=>'transactions.store',
        'uses'=>'TransactionsApiController@store'
        ]);

    Route::put('/transactions/{transaction}', [
        'as'=>'transactions.update',
        'uses'=>'TransactionsApiController@update'
         ]);

    Route::delete('/transactions/{transaction}', [
        'as'=>'transactions.destroy',
        'uses'=>'TransactionsApiController@destroy'
        ]);


//SACCO API ROUTES
        Route::get('/saccos', [
            'as'=>'saccos.index',
            'uses'=>'SaccosApiController@index'
            ]);

            Route::get('/saccos/{sacco}', [
                'as'=>'saccos.show',
                'uses'=>'SaccosApiController@show'
                ]);
       
            Route::post('/saccos', [
               'as'=>'saccos.store',
               'uses'=>'SaccosApiController@store'
               ]);
       
           Route::put('/saccos/{sacco}', [
               'as'=>'saccos.update',
               'uses'=>'SaccosApiController@update'
                ]);
       
           Route::delete('/saccos/{sacco}', [
               'as'=>'saccos.destroy',
               'uses'=>'SaccosApiController@destroy'
               ]);
        


               Route::post('/numbers', [
                'as'=>'numbers.calculate',
                'uses'=>'NumbersController@calculate'
                ]);

                Route::post('/phones/validate', [
                    'as'=>'phones.isValidPhone',
                    'uses'=>'PhoneValidation@isValidPhone'
                    ]);

                    Route::post('/phones/format', [
                        'as'=>'phones.formatPhone',
                        'uses'=>'PhoneValidation@formatPhone'
                        ]);
//The newer versions of laravel create api routes like so..

//Route::get('/transaction', [TransactionsApiController::class, 'index']);
//Route::post('/transactions', [TransactionsApiController::class, 'store']);
//Route::get('saccos/{id}', [SaccosApiController::class, 'show']);
