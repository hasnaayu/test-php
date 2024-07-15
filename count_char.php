<?php

function countChar($word) {
    $word = strtolower($word);

    $char = [];

    for($i = 0; $i < strlen($word); $i++){
        $karakter = $word[$i];
        if(isset($char[$karakter])){
            $char[$karakter]++;
        }
    }

    $banyakChar = '';
    $highestCount = 0;

    foreach ($char as $karakter => $count){
        if ($count > $highestCount){
            $highestCount = $count;
            $banyakChar = $char;
        }
    }

    return $banyakChar . "" . $highestCount . 'x';
}

echo countChar('strawberry');