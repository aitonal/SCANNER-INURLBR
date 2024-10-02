<?php

function __extractEmail($html, $url): void {
    $cor = $GLOBALS['COR'];
    $html = strtolower($html);
    $matches = null;
    __plus();
    preg_match_all('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi', $html, $matches);
    echo "{$cor->whit}[ INF ] [ URL EXTRACT EMAIL ] => {$cor->grey} {$url} {$cor->end}", PHP_EOL;

    $_matches = __array_filter_unique($matches[0]);
    $_matches = __not_empty($_SESSION['config']['ifemail']) ? __filterEmailif($_matches) : $_matches;

    foreach ($_matches as $valor) {
        if (__validateEmail($valor)):

            echo "{$cor->whit}[  +  ] [{$cor->end}{$cor->red1} {$_SESSION['config']['cont_valores']} {$cor->end}] {$valor} "
            . (filter_var($valor, FILTER_VALIDATE_EMAIL) ?
                    "{$cor->cya}[ OK ]{$cor->end}" : "{$cor->red2}[ NO ]{$cor->end}") . PHP_EOL;
            __plus();
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? $_SESSION["config"]["resultado_valores"].= $valor.PHP_EOL : null);
            __plus();
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? __saveValue($_SESSION["config"]["arquivo_output"], $valor) : null);

            $_SESSION['config']['cont_valores'] ++;
        endif;
        __plus();
    }
    __timeSec('delay', PHP_EOL);
}