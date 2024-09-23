<?php

function __extractURLs($html, $url_) {
   if ($url_ and $html):
        __plus();
        $cor = $GLOBALS['COR'];
        $reg_tag = 'href=\"|src=\"|value=\"';
        $reg = "#\b({$reg_tag}http[s]?://|{$reg_tag}ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
        preg_match_all($reg, $html, $matches);
        echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}".PHP_EOL;
        echo "{$cor->whit}[ INF ] [ URL EXTRACT ] {$cor->end}=>{$cor->grey1} {$url_} {$cor->end}".PHP_EOL;
        $matches_ = array_unique(array_filter($matches[0]));
        $trash_list = $_SESSION["config"]['trash_list'];
        $trash_list_ = isset($_SESSION["config"]["webcache"]) ? str_replace('webcache.,', '', $trash_list) : $trash_list;

        foreach ($matches_ as $valor):
            $valor = __filterURLTAG($valor);
            if (__validateURL($valor) && !__validateOptions($trash_list_, $valor, 1)):
                echo "{$cor->whit}[  +  ] {$cor->end}[\033[01;31m {$_SESSION["config"]['cont_url']}"
                . " {$cor->grey1}] {$valor}{$cor->end}".PHP_EOL;
                $_SESSION["config"]["resultado_valores"].="{$valor}".PHP_EOL;
                __plus();
                __saveValue($_SESSION["config"]["arquivo_output"], $valor) . __plus();
                $_SESSION["config"]["cont_url"] ++;
            endif;
            __plus();
        endforeach;
        __timeSec('delay', PHP_EOL);
    endif;
}

function __extractURLDomainsArchive($domain_) {
    if ($domain_): 
        $cor = $GLOBALS['COR'];
        __plus();
        echo "{$cor->whit}[ INF ] [ URL EXTRACT ARCHIVE ] {$cor->end}=>{$cor->grey1} {$domain_} {$cor->end}".PHP_EOL;
        $url_ = "http://web.archive.org/cdx/search/cdx?url=*.{$domain_}/*&output=text&fl=original&collapse=urlkey";
        $matches_ = array_unique(array_filter(explode("\n", __request_info($url_, NULL, NULL)['corpo'])));
        $trash_list = $_SESSION["config"]['trash_list'];

        foreach ($matches_ as $valor):
            $valor = __filterURLTAG($valor);
            if (__validateURL($valor) && !__validateOptions($trash_list, $valor, 1)):
                echo "{$cor->whit}[  +  ] {$cor->end}[\033[01;31m {$_SESSION["config"]['cont_url']}"
                . " {$cor->grey1}] {$valor}{$cor->end}".PHP_EOL;
                $_SESSION["config"]["resultado_valores"].="{$valor}".PHP_EOL;
                __plus();
                __saveValue($_SESSION["config"]["arquivo_output"], $valor) . __plus();
                $_SESSION["config"]["cont_url"] ++;
            endif;
            __plus();
        endforeach;
        __timeSec('delay', "\n");
    endif;
}