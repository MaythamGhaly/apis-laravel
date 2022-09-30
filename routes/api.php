<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApisController;

Route::post("/decompose_number", [ApisController::class, 'decomposeNumber']);
Route::post("/sort_string", [ApisController::class, 'sortString']);
Route::post("/to_binary", [ApisController::class, 'toBinary']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
