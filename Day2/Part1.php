<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

// get the reports from the input file
$reports = [];
$input = fopen("input.txt", "r");
while (!feof($input)) {
    $line = trim(fgets($input));
    $levels = explode(" ", $line);

    $reports[] = $levels;
}
fclose($input);

// how many reports are safe
// check the levels on each report for if they're consistently increasing or decreasing
$safeReports = 0;

foreach ($reports as $report) {
    $positive = ($report[1] - $report[0]) > 0;
    $safe = true;
    $length = count($report);

    for ($i = 0; $i < $length - 1 ; $i++) {
        if ($positive) {
            $diff = $report[$i + 1] - $report[$i];
        } else {
            $diff = $report[$i] - $report[$i + 1];
        }

        if ($diff < 1 || $diff > 3) {
            $safe = false;
        };
    }

    if ($safe) {
        $safeReports++;
    }
}

echo "Safe Reports: " . $safeReports . PHP_EOL;
echo "Unsafe Reports: " . (count($reports) - $safeReports) . PHP_EOL;