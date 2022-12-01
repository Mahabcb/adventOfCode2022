<?php

$input = file_get_contents('inputs/day01');


$lines= explode("
", $input);

// Part 1 
$sum = array_reduce($lines, function($carry, $item) {
    if (empty($item)) {
        $carry[] = 0;
    } else {
        $carry[count($carry)-1] += $item;
    }
    return $carry;
}, [0]);

// Get the max : 
// var_dump(max($sum));

// Part 2

function getThreeElvesCalories($input){
    $sortSum = rsort($input);
    $array= [];
    for($i=0; $i<3; $i++){
        $array[] = $input[$i];
    }
    return array_sum($array);
}
print_r(getThreeElvesCalories($sum));
