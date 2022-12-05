<?php


$input = file_get_contents('input.txt');

$lines = explode("\n", $input);
$array = [];

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) {
        continue;
    }
    $parts = explode(",", $line);
    $array[] = $parts;
}

$new = [];

foreach($array as $item) {
    $new[] = array_map(function($item) {
        return explode("-", $item);
    }, $item);

}

$fullyContains = 0;
$overlaps = 0;

foreach($new as $item) {
    $elf1 = $item[0];
    $elf2 = $item[1];
    if($elf1[0] >= $elf2[0] && $elf1[1] <= $elf2[1] or 
    $elf1[0] <= $elf2[0] and $elf1[1] >= $elf2[1]) {
        $fullyContains ++;
    }
    if (!($elf1[1] < $elf2[0]) && !($elf2[1] < $elf1[0])) {
        $overlaps++;
    }
}

// In how many assignment pairs does one range fully contain the other?
print_r($fullyContains . PHP_EOL);

// In how many assignment pairs do the ranges overlap?
print_r($overlaps . PHP_EOL);
