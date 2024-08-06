<?php

namespace App\Http\Controllers;

use App\Services\RomanConverter;
use Illuminate\Http\Request;

class RomanConverterController extends Controller
{
    protected $converter;

    public function __construct()
    {
        $this->converter = new RomanConverter();
    }

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
            $output = $this->converter->toRoman(intval($input));
        } elseif ($direction == 'toArabic') {
            $output = $this->converter->toArabic(strtoupper($input));
        } else {
            $output = 'Inválido';
        }

        return view('roman_converter', ['input' => $input, 'output' => $output, 'direction' => $direction]);
    }
}
