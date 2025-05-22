<?php


$array = [];
for ($i = 1; $i <= 20; $i++) {
    $array[] = str_repeat('x', $i);
}
print_r($array); 


function arrayFill($value, $length) {
    return array_fill(0, $length, $value);
}

print_r(arrayFill('x', 5)); 


$twoDimArray = [[1, 2, 3], [4, 5], [6]];
$sum = 0;
foreach ($twoDimArray as $subArray) {
    $sum += array_sum($subArray);
}
echo $sum . "\n";


$array = [];
$counter = 1;
for ($i = 0; $i < 3; $i++) {
    $subArray = [];
    for ($j = 0; $j < 3; $j++) {
        $subArray[] = $counter++;
    }
    $array[] = $subArray;
}
print_r($array); 


$array = [2, 6, 3, 52];
$result = ($array[0] * $array[1]) + ($array[2] * $array[3]);
echo $result . "\n"; 


$user = ['name' => 'Esmanuelo', 'surname' => 'ElBruh', 'patronymic' => 'Peutrovich'];
echo $user['surname'] . ' ' . $user['name'] . ' ' . $user['patronymic'] . "\n"; 


$date = ['year' => date('Y'), 'month' => date('m'), 'day' => date('d')];
echo $date['year'] . '-' . $date['month'] . '-' . $date['day'] . "\n"; 


$arr = ['a', 'b', 'c', 'd', 'E'];
echo count($arr) . "\n";


echo $arr[count($arr) - 1] . "\n"; 
echo $arr[count($arr) - 2] . "\n"; 

?>