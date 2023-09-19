<!--Este archivo genera el mes y año para la addion de capetas desntro del server -->

<?php

$year = date("Y");
$month = date("m");

// Estructura de la carpeta deseada
$estructura = "./../include/upload/users/".$year."/".$month  ; 

// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

if(!mkdir($estructura, 0755, true)) {
    die('');
}

// ...
?>