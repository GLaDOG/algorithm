<?php
function Knapsack($capacity, $weight, $value, $itemsCount)
{
    $K = array();

    for ($i = 0; $i <= $itemsCount; ++$i) {
        for ($w = 0; $w <= $capacity; ++$w) {
            if ($i == 0 || $w == 0)
                $K[$i][$w] = 0;
            else if ($weight[$i - 1] <= $w)
                $K[$i][$w] = max($value[$i-1] + $K[$i - 1][$w - $weight[$i - 1]], $K[$i - 1][$w]);
            else
                $K[$i][$w] = $K[$i - 1][$w];
        }
    }
    return $K;
}

$weight = array(9,13,153,50,15,68,27,39,23,52,11,32,24,48,73,42,43,22,7,18,4,30);
$value = array(150,35,200,160,60,45,60,40,30,10,70,30,15,10,40,70,75,80,20,12,50,10);
$capacity = 400;
$itemsCount = count($value);

$result = Knapsack($capacity, $weight, $value, $itemsCount);
print_r($result);
