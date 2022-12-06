<?php

$stack = "
    [D]    
[N] [C]    
[Z] [M] [P]
 1   2   3 

move 1 from 2 to 1
move 3 from 1 to 3
move 2 from 2 to 1
move 1 from 1 to 2
";

[$schema, $instructions] = explode("\n\n", trim($stack,"\n"));

$lines = str_split($schema, 4);


$instructions = explode("
", $instructions);


$array = [];

foreach ($instructions as $instruction) {
    $sentence = explode(" ", $instruction);
    $array[] = $sentence;
}

foreach($array as $instruction) {
    $from = $instruction[3];
    $to = $instruction[5];
    $disk = $instruction[1];
}




