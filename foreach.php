<?php

    $array = array("uno", "dos", "tres");
//    reset($array);
//    while (list($clave, $valor) = each($array)) {
//        echo "Clave: $clave; Valor: $valor<br />\n";
//    }

    foreach ($array as $clave => $valor) {
        echo "Clave: $clave; Valor: $valor<br />\n";
    }
