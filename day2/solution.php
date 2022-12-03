<?php

$play = file_get_contents('input.txt');

$lines = explode("\n", $play);

// part 1
$array = [];
$score = 0;
foreach($lines as $key => $lines) {
    $array[]= $lines;
    switch($array[$key]) {
        case 'A X':
            $score += 4;
            break;
        case 'A Y':
            $score += 8;
            break;
        case 'A Z':
            $score += 3;
            break;
        case 'B X':
            $score += 1;
            break;
        case 'B Y':
            $score += 5;
            break;
        case 'B Z':
            $score += 9;
            break;
        case 'C X':
            $score += 7;
            break;
        case 'C Y':
            $score += 2;
            break;
        case 'C Z':
            $score += 6;
            break;
    }

}

print('The total score if everything goes exactly according to plan is: ' . $score . PHP_EOL);

// Part 2

$lines2= explode("\n", $play);
const POSSIBILITIES = [
    'A X' => 3, 
    'A Y' => 4,
    'A Z' => 8,
    'B X' => 1, 
    'B Y' => 5,
    'B Z' => 9,
    'C X' => 2, 
    'C Y' => 6,
    'C Z' => 7,
];

$array2 = [];
$score2 = 0 ; 
foreach($lines2 as $line) {
    $array2[] = explode(' ', $line);
}

foreach($array2 as $key => $value) {
    $score2 += POSSIBILITIES[$value[0] . ' ' . $value[1]];
}
print_r("With the correct secret strategy guide, I would get a total score of " . $score2);



