<?php
$str = 'mabm mem m12m mm mmxm mabcm m--m mabcmm';
preg_match_all('/m..m/', $str, $matches);
print_r($matches[0]);
?>