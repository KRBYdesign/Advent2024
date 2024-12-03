<?php

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
error_reporting(E_ALL);

// parse input numbers and sort into lists
$leftList = [];
$rightList = [];

$input = fopen("./input.txt", "r");

while (!feof($input)) {
    $line = str_replace(" ", "", trim(fgets($input)));
    $leftList[] = substr($line, 0, 5);
    $rightList[] = substr($line, 5);
}
fclose($input);

// sort lists by shortest to longest

if (!sort($leftList, SORT_NUMERIC)) {
    die("Could not sort left list.");
}
if (!sort($rightList, SORT_NUMERIC)) {
    die("Could not sort right list.");
}

// record all distances in third list
$diffs = [];

// compare smallest in left -> smallest in right then next smallest, and so on
if (count($leftList) != count($rightList)) {
    echo "Lists are not equal in length \n";
}

for ($i = 0; $i < count($leftList); $i++) {
    $diffs[] = abs($leftList[$i] - $rightList[$i]);
}

//for ($i = 0; $i < 10; $i++) {
//    echo $leftList[$i] . " - " . $diffs[$i] . " - " . $rightList[$i] . "\n";
//}

// sum that third list
$total = array_sum($diffs);

echo $total . "\n";