<?php

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
error_reporting(E_ALL);

// parse input numbers into lists
$leftList = [];
$rightList = [];

$input = fopen("./input.txt", "r");

while (!feof($input)) {
    $line = str_replace(" ", "", trim(fgets($input)));

    $leftList[] = substr($line, 0, 5);
    $rightList[] = substr($line, 5);
}
fclose($input);

$occurrences = [];
// check how often each number in the left list occurs in the right list
foreach ($leftList as $left) {
    $increment = 0;

    foreach ($rightList as $right) {
        if ($left === $right) {
            $increment++;
        }
    }

    $occurrences[$left] = $increment;
    if ($increment != 0) {
        echo $left . " -> " . $increment . "\n";
    }
}

// find the similarity score for each number in the left list
$total = 0;
foreach ($occurrences as $left => $occurrence) {
    $total += $left * $occurrence;
}

echo "\n\nTotal:\n$total\n";