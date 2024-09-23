<?php

function __exitProcess() {
    $cor = $GLOBALS['COR'];
    $file = !is_null($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : NULL;
    $file_all = !is_null($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : NULL;
    (($_SESSION['config']['extrai-email']) ? __filterEmailsRepeated() : NULL);
    $cont = count(explode("\n", $_SESSION['config']['resultado_valores'])) - 1;
    echo "\n\n{$cor->whit}[ INF ] [ Shutting down ]{$cor->end}";
    echo "\n{$cor->whit}[ INF ] [ End of process INURLBR at [ " . date("d-m-Y H:i:s") . " ]{$cor->end}";
    echo "\n{$cor->whit}[ INF ] {$cor->end}{$cor->red2}[ TOTAL FILTERED VALUES ]::{$cor->end}{$cor->whit} [ {$cont} ]{$cor->end}";
    echo!is_null($file) ? PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ OUTPUT FILE ]::{$cor->whit} [ {$_SESSION['config']['out_put_paste']}{$file}  ]{$cor->end}" : NULL;
    echo!is_null($file_all) ? PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ OUTPUT FILE ALL ]:: {$cor->whit} [ {$_SESSION['config']['out_put_paste']}{$file_all}  ]{$cor->end}" : NULL;
    echo "\n{$cor->whit}|--------------------------------------------------------------------------------------------------------------{$cor->end}".PHP_EOL;

    print_r(!$_SESSION['config']['extrai-email'] ? $_SESSION['config']['resultado_valores'] : NULL);

    echo PHP_EOL."{$cor->whit}\--------------------------------------------------------------------------------------------------------------/{$cor->end}".PHP_EOL;
    __getOut(PHP_EOL);
}