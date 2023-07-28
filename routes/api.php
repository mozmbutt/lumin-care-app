<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/order', function (Request $request) {
    // Access and process the data from the incoming request
    $requestData = $request->all(); // Get all request data as an array

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://heatcorestore-3.myshopify.com/admin/api/2021-10/orders.json',
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $requestData,
    CURLOPT_HTTPHEADER => array(
        'X-Shopify-Access-Token: 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',
        'Content-Type: application/json',
        'Access-Control-Allow-Origin: *'
    )
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return true;
});
