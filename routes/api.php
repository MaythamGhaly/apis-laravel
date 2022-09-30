<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("/string_sort", [TestController::class, 'stringSort']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
