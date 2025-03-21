<?php

function printStringReturnNumber(): int {
    echo "Строка \n";
    return 56;
}

$my_num = printStringReturnNumber();
echo $my_num;