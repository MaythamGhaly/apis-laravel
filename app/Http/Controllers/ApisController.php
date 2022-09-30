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
            '/\b[0-9]+\b/' => function ($matches) {
                return decbin($matches[0]);
            }
        ];
        $result = preg_replace_callback_array($patterns, $input);
        
        return response()->json([
            "status" => "success",
            "to_binary" => $result
        ]);
    }

    
