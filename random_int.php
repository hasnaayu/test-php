<?php

function generateRandomArray($size = 5, $min = 0, $max = 100)
{
    $randomArray = [];
    for ($i = 0; $i < $size; $i++) {
        $randomArray[] = rand($min, $max);
    }

    return $randomArray;
}

function findSecondLargest($arr)
{
    if (count($arr) < 2) {
        return null;
    }

    $largest = $secondLargest = PHP_INT_MIN;

    foreach ($arr as $number) {
        if ($number > $largest) {
            $secondLargest = $largest;
            $largest = $number;
        } else  if ($number > $secondLargest && $number != $largest) {
            $secondLargest = $number;
        }
    }

    return $secondLargest;
}

$randomArray = generateRandomArray();

echo "Array: " . implode(", ", $randomArray) . "\n";

$secondLargest = findSecondLargest($randomArray);

echo "Second-largest number : " . $secondLargest . "\n";
