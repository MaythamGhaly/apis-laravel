<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApisController extends Controller
{
    function stringSort(Request $request){
        $number = $request->number;
        $arr=[];
        $x=10;
        while ($number>0){
            $rest=$number%$x;
            array_push($arr,$rest);
            $number=$number-$rest;
            $x=$x*10;
        }

        return response()-> json([
            "status"=>"success",
            "number"=> $number,
            "decompose number"=>$arr
        ]);
    }
}
