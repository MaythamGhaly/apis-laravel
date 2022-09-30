<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApisController;

Route::post("/string_sort", [ApisController::class, 'stringSort']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
