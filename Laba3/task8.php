<?php

// Функция для добавления восклицательного знака
function increaseEnthusiasm($str) {
    return $str . '!';
}

// Функция для повторения строки три раза
function repeatThreeTimes($str) {
    return str_repeat($str, 3);
}

// Функция для обрезки строки
function cut($str, $length = 228) {
    return substr($str, 0, $length);
}

// Рекурсивный вывод элементов массива
function printArrayRecursively($array, $index = 0) {
    if ($index < count($array)) {
        echo $array[$index] . "\n";
        printArrayRecursively($array, $index + 1);
    }
}

// Суммирование цифр числа до однозначного числа
function sumDigits($number) {
    while ($number > 9) {
        $sum = 0;
        $digits = str_split((string)$number);
        foreach ($digits as $digit) {
            $sum += (int)$digit;
        }
        $number = $sum;
    }
    return $number;
}

// Примеры использования функций
echo increaseEnthusiasm("ELden ring?") . "\n";
echo repeatThreeTimes("No") . "\n";
echo increaseEnthusiasm(repeatThreeTimes("Dark Souls 2 2")) . "\n";
echo cut("WOW!", 5) . "\n"; !

$numbers = [5, 6, 9, 007, 10];
printArrayRecursively($numbers); 

echo sumDigits(69141) . "\n";

?>