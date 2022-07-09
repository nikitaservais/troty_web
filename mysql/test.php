<?php 

$var = "02492387079526083017";
while(!$var[0]) {
    $var = substr($var, 1);
    echo $var."<br>";
}
echo $var."<br>";