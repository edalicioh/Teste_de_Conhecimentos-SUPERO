<?php

/* Refatore o código abaixo, fazendo as alterações que julgar necessário.
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: http://www.google.com");
        exit();
    } elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
        header("Location: http://www.google.com");
        exit();
    } 
*/
if ( ( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ||
    ( isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true ) ) {
    header("Location: http://www.google.com");
    exit();
}