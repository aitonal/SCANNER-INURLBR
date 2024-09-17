<?php

function __saveValue($arquivo, $valor, $op = NULL) {

    $path = !__not_empty($_SESSION['config']['save-as']) ? $_SESSION['config']['out_put_paste'] : NULL;
    
    if($op == 1):
        echo PHP_EOL."{$_SESSION["c1"]}[  !  ]{$_SESSION["c1"]} VALUE SAVED IN THE FILE::{$_SESSION["c9"]} {$arquivo}{$_SESSION["c0"]}";
    endif;

    file_put_contents(($op == 2) ? $arquivo : $path . $arquivo, $valor.PHP_EOL, FILE_APPEND);
}