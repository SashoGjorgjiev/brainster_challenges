<?php
//Function 01 : Converts decimal number to a binary number.
function decimalToBinary($decimal){
    $binary = '';
    while($decimal >0){
        $binary=($decimal % 2) . $binary;
        $decimal = floor($decimal / 2);
    }
    return $binary;
}
$decimalNumber = 30;
$binaryNumber = decimalToBinary($decimalNumber);
echo "Decimal: $decimalNumber = Binary: $binaryNumber" . "<br>";

// Function 02  Converts decimal number to Roman number. Maximum number
// that can be converted is 3999. If the number is greater than 3999, the function
// should print an error message.

function decimalToRoman($decimal) {
    if ($decimal > 3999) {
        echo "Error: Number is above 3999.";
    }

    $romanNumerals = [
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

    $roman = '';
    foreach ($romanNumerals as $key => $value) {
        while ($decimal >= $value) {
            $roman .= $key;
            $decimal -= $value;
        }
    }
    return $roman;
}

$decimalNumber = 10;
$romanNumber = decimalToRoman($decimalNumber);
echo "Decimal: $decimalNumber = Roman: $romanNumber" . "<br>";

//Function 03 Converts a binary number to a decimal number.
function binaryToDecimal($binary) {
    $decimal = 0;
    $length = strlen($binary);

    for ($i = $length - 1; $i >= 0; $i--) {
        $decimal += intval($binary[$i]) * pow(2, $length - 1 - $i);
    }

    return $decimal;
}
$binaryNumber = '110010';
$decimalNumber = binaryToDecimal($binaryNumber);
echo "Binary: $binaryNumber = Decimal: $decimalNumber" . "<br>";





//Function 04   Converts a roman number to a decimal number




function romanToDecimal($roman) {
    $romanNumerals = array(
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
    );

    $decimal = 0;
    $length = strlen($roman);

    for ($i = 0; $i < $length; $i++) {
        if ($i + 1 < $length && isset($romanNumerals[$roman[$i].$roman[$i+1]])) {
            $decimal += $romanNumerals[$roman[$i].$roman[$i+1]];
            $i++;
        } else {
            $decimal += $romanNumerals[$roman[$i]];
        }
    }

    return $decimal;
}
$romanNumber = 'L';
$decimalNumber = romanToDecimal($romanNumber);
echo "Roman: $romanNumber = Decimal: $decimalNumber" . "<br>";