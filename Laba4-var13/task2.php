<?php
$str = '443';

$result = preg_replace_callback('/\d+/', function ($matches) {
    return $matches[0] + 100;
}, $str);

echo $result;
?>