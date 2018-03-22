<?php

use App\Transaction;
use App\Client;
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

Route::post('customer/{name}/{cnp}', function($name, $cnp) {
    $client = Client::create(['name' => $name, 'cnp' => $cnp]);
    return response()->json([ 'customerId' => $client->id]);
});

Route::post('transaction/{customerId}/{amount}', function($customerId, $amount) {
    $transaction = Transaction::create(['customerId' => $customerId, 'amount' => $amount]);
    return $transaction->toJson();
});

Route::get('transactions', function () {
    return response(Transaction::all(),200);
});

Route::get('transaction/{customerId}', function ($customerId) {
    return response(Transaction::OfClientsTransactions(['customerId' => $customerId])->get(), 200);
});

