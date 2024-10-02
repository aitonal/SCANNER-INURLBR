<?php

function __extractRegCustom($html, $url) {
    if (__not_empty($html) && __not_empty($url)):
        $html = strtolower($html);
        $out_matches = null;
        $cor = $GLOBALS['COR'];
        __plus();
        preg_match_all("#\b{$_SESSION['config']['regexp-filter']}#i", $html, $out_matches);
        echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}", PHP_EOL;
        echo "{$cor->whit}[ INF ][URL REGEX CUSTOM] {$cor->end}=>{$cor->grey1} {$url} {$cor->end}", PHP_EOL;
        $out_matches_unique = __array_filter_unique($out_matches[0]);
        __plus();
        if(__not_empty($out_matches_unique)):
            foreach ($out_matches_unique as $valor):
                if (__not_empty($valor)):
                    echo "{$cor->whit}[  +  ]{$cor->end}[{$cor->red1} {$_SESSION['config']['cont_valores']} {$cor->end}] {$valor}", PHP_EOL;
                    $_SESSION["config"]["resultado_valores"].=$valor.PHP_EOL;
                    __plus();
                    __saveValue($_SESSION["config"]["arquivo_output"], $valor);
                    $_SESSION['config']['cont_valores'] ++;
                endif;
                __plus();
            endforeach;
            __timeSec('delay', PHP_EOL);
        endif;
    endif;
}