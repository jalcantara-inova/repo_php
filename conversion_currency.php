<?php

    $amount = 1;
    $amount = urlencode($amount);
    #Establecemos el origen como Dolar canadiense
    $from_Currency = 'CAD';
    $from_Currency = urlencode($from_Currency);
    #Establecemos el destino como dolar americano
    $to_Currency = 'USD';
    $to_Currency = urlencode($to_Currency);
    $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
    $get = explode("<span class=bld>",$get);
    $get = explode("</span>",$get[1]);

    echo $converted_amount = (float)preg_replace("/[^0-9\.]/", null, $get[0]);
?>