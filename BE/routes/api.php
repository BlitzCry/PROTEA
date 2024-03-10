<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("healthcheck", function (Request $request) {
    return response()->json(["health" => "OK"]);
});

Route::group(["prefix" => "pipeline/"], function () {
    Route::get("healthcheck", function (Request $request) {
        return response()->json(["health" => "OK", "routes" => "pipeline"]);
    });

    Route::get("date", function (Request $request) {
        dd($request->date);
        return Carbon::parse($request->date);
    });

    Route::get("time", function (Request $request) {
        return Carbon::parse($request->time);
    });
});
