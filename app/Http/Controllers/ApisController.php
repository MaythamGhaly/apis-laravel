<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Psy\debug;

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

    function sortString(Request $req)
    {
        $str = $req->str;
        $sorted_str = str_split($str);
        natcasesort($sorted_str);
        $arr = [];
        $i = 0;
        
        foreach($sorted_str as $nb) {
            if(!is_numeric($nb))
                break;
            else
                $arr[] = array_shift($sorted_str);
        }
        
        for ($i = 0; $i<count($sorted_str)-1; $i++) {
            $j = $i + 1;
            if (strtolower($sorted_str[$i]) === $sorted_str[$j]) {
                $replace = $sorted_str[$i];
                $sorted_str[$i] = $sorted_str[$j];
                $sorted_str[$j] = $replace;
            }
        }

        for ($i = 0; $i < count($arr); $i++) {
            array_push($sorted_str, $arr[$i]);
        }

        return response()->json([
            "status" => "success",
            "str" => $sorted_str
        ]);
    }
}
