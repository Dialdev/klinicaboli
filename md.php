<?php

$f = fopen("base.txt", "r");
$w = fopen("base1.txt", "w");
while (!feof($f)) {
    $buffer = fgets($f, 4096);
    if ($buffer != "")
        echo $buffer.'<br>';
    fwrite($w, PHP_EOL . md5($buffer)); 
}
fclose($handle);




?>