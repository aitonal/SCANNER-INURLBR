<?php

function __extractEmail($html, $url_) {
    $cor = $GLOBALS['COR'];
    $matches = NULL;
    __plus();
    preg_match_all('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi', $html, $matches);
    echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}".PHP_EOL;
    echo "{$cor->whit}[ INF ] [ URL EXTRACT EMAIL ] => {$cor->grey1} {$url_} {$cor->end}".PHP_EOL;

    $_matches = array_filter(array_unique(array_unique($matches[0])));
    $matches_ = (__not_empty($_SESSION['config']['ifemail']) ? __filterEmailif($_matches) : $_matches);

    foreach ($matches_ as $valor) {

        if (__validateEmail($valor)):

            echo "{$cor->whit}[  +  ] {$cor->end}[\033[01;31m {$_SESSION['config']['cont_valores']} {$cor->end}] {$valor} "
            . (filter_var($valor, FILTER_VALIDATE_EMAIL) ?
                    "{$cor->cya}[ OK ]{$cor->end}" : "{$cor->red2}[ NO ]{$cor->end}") . PHP_EOL;
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? $_SESSION["config"]["resultado_valores"].="{$valor}".PHP_EOL : NULL);
            __plus();
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? __saveValue($_SESSION["config"]["arquivo_output"], $valor) : NULL);

            $_SESSION['config']['cont_valores'] ++;
        endif;
        __plus();
    }
    __timeSec('delay', PHP_EOL);
}