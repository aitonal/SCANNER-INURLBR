<?php

function __extractRegCustom($html, $url) {
    if (__not_empty($html) and __not_empty($url)):
        $out_matches = NULL;
        __plus();
        preg_match_all("#\b{$_SESSION['config']['regexp-filter']}#i", $html, $out_matches);
        echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}".PHP_EOL;
        echo "{$_SESSION["c1"]}[ INF ][URL REGEX CUSTOM] {$_SESSION["c0"]}=>{$_SESSION["c9"]} {$url} {$_SESSION["c0"]}".PHP_EOL;
        $out_matches_unique = array_filter(array_unique(array_unique($out_matches[0])));
        if(__not_empty($out_matches_unique)):
            foreach ($out_matches_unique as $valor):
                if (__not_empty($valor)):
                    echo "{$_SESSION["c1"]}[  +  ]{$_SESSION["c0"]}[\033[01;31m {$_SESSION['config']['cont_valores']} {$_SESSION["c0"]}] {$valor}".PHP_EOL;
                    $_SESSION["config"]["resultado_valores"].=$valor.PHP_EOL;
                    __plus();
                    __saveValue($_SESSION["config"]["arquivo_output"], $valor);
                    $_SESSION['config']['cont_valores'] ++;
                endif;
                __plus();
            endforeach;
            __timeSec('delay', "\n");
        endif;
    endif;
}