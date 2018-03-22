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

Route::get('transactions', function () {
    return response(Transaction::all(),200);
});

Route::get('transaction/{customerId}', function($customerId) {
    $transaction = Transaction::where('customerId', $customerId)->get();
    return $transaction;
})->where(['customerId' => '[0-9]+']);

Route::post('transaction/{customerId}/{amount}', function($customerId, $amount) {
    $transaction = Transaction::create(['customerId' => $customerId, 'amount' => $amount]);
    return $transaction->toJson();
})->where([
    'customerId' => '[0-9]+',
    'amount' => '[0-9]+(\.[0-9][0-9]?)?']);

Route::get('transaction/{customerId}/{amount}/{date}/{offset}/{limit}', function ($customerId, $amount, $date, $offset, $limit) {
    return response(Transaction::OfClientsTransactions(['customerId' => $customerId, 'amount' => $amount, 'date' => $date])->skip($offset)->take($limit)->get(), 200);
})->where([
    'customerId' => '[0-9]+',
    'amount' => '[0-9]+(\.[0-9][0-9]?)?',
    'date' => '^\s*(3[01]|[12][0-9]|0?[1-9])\-(1[012]|0?[1-9])\-((?:19|20)\d{2})\s*$',
    'offset' => '[0-9]+',
    'limit' => '[0-9]+']);

