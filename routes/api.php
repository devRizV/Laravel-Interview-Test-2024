<?php

use App\Http\Controllers\Api\V1\CityApiController;
use App\Http\Controllers\Api\V1\CountryApiController;
use App\Http\Controllers\Api\V1\StateApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('countries', CountryApiController::class);
    Route::apiResource('states', StateApiController::class);
    Route::apiResource('cities', CityApiController::class);
});



