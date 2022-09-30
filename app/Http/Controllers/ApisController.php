<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApisController extends Controller
{
    function decomposeNumber(Request $request)
    {
        $number = $request->number;
        $arr = [];
        $x = 10;
        while ($number > 0) {
            $rest = $number % $x;
            array_push($arr, $rest);
            $number = $number - $rest;
            $x = $x * 10;
        }

        return response()->json([
            "status" => "success",
            "number" => $number,
            "decompose number" => $arr
        ]);
    }

    function toBinary(Request $request)
    {
        $input = $request->input;
        $patterns = [
            '/[0-9]/' => function ($matches) {
                return decbin($matches[0]);
            }
        ];
        $result = preg_replace_callback_array($patterns, $input);
        
        return response()->json([
            "status" => "success",
            "to_binary" => $result
        ]);
    }

    function sortString(Request $request)
    {
        $str = $request->str;
        $x = preg_split("/[a-z]/", $str);
        for ($i = 0; $i < count($x); $i++) {
            if (is_numeric($x[$i])) {
                $x[$i] = decbin($x[$i]);
            }
        }
        // $str=str_split($str);
        // sort($str);

        // for($i=0;$i<count($str);$i++){
        //     if (is_numeric($str[$i])){
        //         echo preg_split($str[$i]);
        //     }
        // }




        return response()->json([
            "status" => "success",
            "str_sort" => $str
        ]);
    }
}
