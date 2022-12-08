<?php

$input = file_get_contents('input.txt');

$lines = explode("\n", $input);

$directory = [];
$sizes = [];
$totalSize = 0;
foreach($lines as $line){
    if(preg_match('/^\$ cd /', $line)){
        preg_match('/^\$ cd (\S+)/', $line, $matches);
        $targetDir = $matches[1]; 

        if($targetDir == '..'){
            array_pop($directory);
        }else{
            array_push($directory, $targetDir);
        }
    }
    if (preg_match('/^\d+ /', $line)) {
        preg_match('/^(\d+) /', $line, $matches);
        $size = $matches[1];
    
        $currentDir = implode('/', $directory);
        if (!isset($sizes[$currentDir])) {
          $sizes[$currentDir] = 0;
        }
        $sizes[$currentDir] += $size;
      }
}
unset($sizes['/']);
$sizes = array_filter($sizes, function ($size) {
    return $size <= 100000;
  });

$totalSize = array_sum($sizes);

echo "Sum of the total sizes of directories with size at most 100000: $totalSize\n";


// Part 2
$largestDir = null;
$largestSize = 0;
foreach ($sizes as $dir => $size) {
  if ($size > $largestSize && $size <= 30000000) {
    $largestDir = $dir;
    $largestSize = $size;
  }
}
if ($largestDir !== null) {
    unset($sizes[$largestDir]);
  }

echo "Largest directory with size at most 30000000: $largestDir ($largestSize)\n";
