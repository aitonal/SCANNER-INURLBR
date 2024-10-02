<?php

function __filterEmailsRepeated(): void {
    $cor = $GLOBALS['COR'];
    $file_open = __openFile($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output'], 1);
    if (is_array($file_open)):
        unlink($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output']);
        unset($_SESSION['config']['result_values']);
        foreach ($file_open as $value):
            __saveValue($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output'], $value, 2) . __plus();
            $_SESSION['config']['result_values'] .= $value.PHP_EOL;
        endforeach;
    else:
        echo PHP_EOL, PHP_EOL, "{$cor->whit}|[ ERROR ][ ERROR EMAILS FILTERING ]{$cor->end}", PHP_EOL;
        __plus();
    endif;
}