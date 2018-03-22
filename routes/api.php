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

Route::post('customer', function() {
    return  response()->json([
        'message' => 'Create success'
    ], 201);
});

Route::post('transaction', function() {
    return  response()->json([
        'message' => 'Create success'
    ], 201);
});

Route::get('transaction', function () {
    return response(['transaction 1', 'transaction 2', 'transaction 3'],200);
});

Route::get('transaction/{customerId}/{amount}/{date}/{offset}/{limit}', function ($customerId) {
    return response()->json(['productId' => "{customerId}"], 200);
});

