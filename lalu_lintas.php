<?php
$colors = ['merah', 'kuning', 'hijau'];
function trafficLight()
{
    static $index = 0;
    global $colors;
    
    $printedColor = $colors[$index];
    $index = ($index +1) %count($colors);
    return $printedColor;
}

echo trafficLight();
echo "\n";
echo trafficLight();
echo "\n";
echo trafficLight();
echo "\n";
echo trafficLight();
echo "\n";
echo trafficLight();
echo "\n";
echo trafficLight();
echo "\n";
echo trafficLight();
echo "\n";