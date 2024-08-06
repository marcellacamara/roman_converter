<?php

namespace App\Services;

class RomanConverter
{
    protected $mapToRoman = [
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

    protected $mapToArabic = [
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

    public function toRoman(int $number): string
    {
        $result = '';
        while ($number > 0) {
            foreach ($this->mapToRoman as $roman => $value) {
                if ($number >= $value) {
                    $number -= $value;
                    $result .= $roman;
                    break;
                }
            }
        }
        return $result;
    }

    public function toArabic(string $roman): int
    {
        $result = 0;
        for ($i = 0; $i < strlen($roman); $i++) {
            $value1 = $this->mapToArabic[$roman[$i]];
            $value2 = $i + 1 < strlen($roman) ? $this->mapToArabic[$roman[$i + 1]] : 0;

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
