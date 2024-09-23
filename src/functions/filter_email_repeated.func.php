<?php

function __filterEmailsRepeated() {
    $cor = $GLOBALS['COR'];
    echo PHP_EOL.PHP_EOL."{$cor->whit}|[ INF ][ Filtering the repeated emails  the file {$_SESSION['config']['arquivo_output']} ]{$cor->end}".PHP_EOL;
    $array = __openFile($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output'], 1);
    if (is_array($array)):

        unlink($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output']);
        unset($_SESSION['config']['resultado_valores']);
        foreach ($array as $value):
            __saveValue($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output'], $value, 2) . __plus();
            $_SESSION['config']['resultado_valores'] .= "{$value}".PHP_EOL;
        endforeach;
    else:
        echo PHP_EOL.PHP_EOL."{$cor->whit}|[ ERROR ][ ERROR EMAILS FILTERING ]{$cor->end}".PHP_EOL;
    endif;
}