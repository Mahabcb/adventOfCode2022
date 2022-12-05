<?php

$rucksack = file_get_contents("input.txt");

$lines = explode("\n", $rucksack);

$alphabet= [
    'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'i' => 9, 'j' => 10,
    'k' => 11, 'l' => 12, 'm' => 13, 'n' => 14, 'o' => 15, 'p' => 16, 'q' => 17, 'r' => 18, 's' => 19, 't' => 20,
    'u' => 21, 'v' => 22, 'w' => 23, 'x' => 24, 'y' => 25, 'z' => 26,

    'A' => 27, 'B' => 28, 'C' => 29, 'D' => 30, 'E' => 31, 'F' => 32, 'G' => 33, 'H' => 34, 'I' => 35, 'J' => 36,
    'K' => 37, 'L' => 38, 'M' => 39, 'N' => 40, 'O' => 41, 'P' => 42, 'Q' => 43, 'R' => 44, 'S' => 45, 'T' => 46,
    'U' => 47, 'V' => 48, 'W' => 49, 'X' => 50, 'Y' => 51, 'Z' => 52,
]; 


// Part 1

$score = 0;
$array = [];
foreach($lines as $key => $line) {
    //supprimer les ligne vide
    if($line == "") {
        unset($lines[$key]);
    }else{
        $count=strlen($line);
        $compartiment1= str_split(substr($line, 0, $count/2));
        $compartiment2 = str_split(substr($line, $count/2, $count));
        $sameItems = array_unique(array_intersect($compartiment1, $compartiment2));
        // replace array key from sameitem by value of alphabet
        $sameItems = array_map(function($item) use ($alphabet) {
            return $alphabet[$item];
        }, $sameItems);
       foreach($sameItems as $key => $item) {
            $array[] = $item;
       }
    }

}
print_r("The value is : " . array_sum($array). PHP_EOL);

// Part 2 : 

 function getAnArrayWithThreeLine($lines){
    $array = [];
    for($i = 0; $i < count($lines); $i+=3){
        $array[] = [$lines[$i], $lines[$i+1], $lines[$i+2]];
    }
    return $array;
}

$arrayOfThree = getAnArrayWithThreeLine($lines);


function getLetter($line1, $line2, $line3) {
    $letter = '';
    $line1 = str_split($line1);
    $line2 = str_split($line2);
    $line3 = str_split($line3);
    foreach ($line1 as $key => $value) {
        if(in_array($value, $line2) && in_array($value, $line3)&& in_array($value, $line1)) {
            $letter = $value;
        }
    }
    return $letter;
}

function getTheLetter($array){
    $letters = [];
    foreach ($array as $key => $value) {
        $letter = getLetter($value[0], $value[1], $value[2]);
        $letters[] = $letter;
    }
    return $letters;
}

$letters = getTheLetter($arrayOfThree);


function getTheValueOfTheLetter($letters, $alphabet){
    $values = [];
    foreach ($letters as $key => $value) {
        $values[] = $alphabet[$value];
    }
    return array_sum($values);
}

$arrayOfThree = getAnArrayWithThreeLine($lines);
$letter = getTheLetter($arrayOfThree);

$value = getTheValueOfTheLetter($letters, $alphabet);

print_r("The value of the letters is : " . $value . PHP_EOL);


