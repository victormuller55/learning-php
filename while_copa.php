<?php

print("<h1>ANOS DE COPA DO MUNDO</h1>");

$copa = 1930;

while($copa <= 2024) {
    if($copa != 1942 && $copa != 1946) {
        print("Houve copa: $copa <br>");
    } else {
        print("Não houve copa: $copa <br>");
    }
    $copa+=4;
}

?>