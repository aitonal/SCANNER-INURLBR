<?php

function __saveValue($arquivo, $valor, $op = null): void {
    $cor = $GLOBALS['COR'];
    $path = !__not_empty($_SESSION['config']['save-as']) ? $_SESSION['config']['out_put_paste'] : null;
    
    if($op == 1):
        echo PHP_EOL, "{$cor->whit}[ INF ]{$cor->whit}  Value saved in the file::{$cor->grey} {$arquivo}{$cor->end}";
    endif;

    file_put_contents(($op == 2) ? $arquivo : $path . $arquivo, $valor.PHP_EOL, FILE_APPEND);
}