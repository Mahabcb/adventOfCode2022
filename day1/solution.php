<?php

$input = file_get_contents('input.txt');


$lines= explode("\n", $input);

// Part 1 

$sum = array_reduce($lines, function($carry, $item) {
    if (empty($item)) {
        $carry[] = 0;
    } else {
        $carry[count($carry)-1] += $item;
    }
    return $carry;
}, [0]);

print_r('Part 1: The elf with the most calories has a total of : ' . max($sum) .' calories ' . PHP_EOL);

// Part 2

function getThreeElvesCalories($input){
    $sortSum = rsort($input);
    $array= [];
    for($i=0; $i<3; $i++){
        $array[] = $input[$i];
    }
    return array_sum($array);
}
print_r('Part 2: the three eleves with the most calories have a total of : ' . getThreeElvesCalories($sum) . ' calories ' . PHP_EOL);
