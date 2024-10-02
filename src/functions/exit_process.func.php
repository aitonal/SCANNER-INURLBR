<?php

function __exitProcess() {
    $cor = $GLOBALS['COR'];
    $file = !is_null($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : null;
    $file_all = !is_null($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : null;
    (($_SESSION['config']['extrai-email']) ? __filterEmailsRepeated() : null);
    $cont = count(explode("\n", $_SESSION['config']['result_values'])) - 1;
    echo PHP_EOL, PHP_EOL, "{$cor->whit}[ INF ] [ Shutting down ]{$cor->end}";
    echo PHP_EOL, "{$cor->whit}[ INF ] [ End of process INURLBR at [ " . date("d-m-Y H:i:s") . " ]{$cor->end}";
    echo PHP_EOL, "{$cor->whit}[ INF ] {$cor->end}{$cor->red2}[ TOTAL FILTERED VALUES ]::{$cor->end}{$cor->whit} [ {$cont} ]{$cor->end}";
    echo!is_null($file) ? PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ OUTPUT FILE ]::{$cor->whit} [ {$_SESSION['config']['out_put_paste']}{$file}  ]{$cor->end}" : null;
    echo!is_null($file_all) ? PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ OUTPUT FILE ALL ]:: {$cor->whit} [ {$_SESSION['config']['out_put_paste']}{$file_all}  ]{$cor->end}" : null;
    echo PHP_EOL, "{$cor->whit}|--------------------------------------------------------------------------------------------------------------{$cor->end}", PHP_EOL;
    __plus();
    print_r(!$_SESSION['config']['extrai-email'] ? $_SESSION['config']['result_values'] : null);
    __plus();
    echo PHP_EOL, "{$cor->whit}\--------------------------------------------------------------------------------------------------------------/{$cor->end}", PHP_EOL;
    __getOut(PHP_EOL);
    __plus();
}