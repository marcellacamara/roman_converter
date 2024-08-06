<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RomanConverterController extends Controller
{
    public function index()
    {
        return view('roman_converter');
    }

    public function convert(Request $request)
    {
        $input = $request->input('number');
        $direction = $request->input('direction');
        $output = '';

        if ($direction == 'toRoman' && is_numeric($input)) {
            $output = $this->toRoman(intval($input));
        } elseif ($direction == 'toArabic') {
            $output = $this->toArabic(strtoupper($input));
        } else {
            $output = 'Inválido';
        }

        return view('roman_converter', ['input' => $input, 'output' => $output, 'direction' => $direction]);
    }

    private function toRoman($number)
    {
        $map = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];

        $result = '';
        while ($number > 0) {
            foreach ($map as $roman => $value) {
                if ($number >= $value) {
                    $number -= $value;
                    $result .= $roman;
                    break;
                }
            }
        }

        return $result;
    }

    private function toArabic($roman)
    {
        $map = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];

        $result = 0;
        for ($i = 0; $i < strlen($roman); $i++) {
            $value1 = $map[$roman[$i]];
            $value2 = $i + 1 < strlen($roman) ? $map[$roman[$i + 1]] : 0;

            if ($value1 < $value2) {
                $result += $value2 - $value1;
                $i++;
            } else {
                $result += $value1;
            }
        }

        return $result;
    }
}
