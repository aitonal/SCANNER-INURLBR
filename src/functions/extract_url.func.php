<?php

function __extractURLs($html, $url) {
   if (__not_empty($url) && __not_empty($html)):
        __plus();
        $cor = $GLOBALS['COR'];
        $reg_tag = 'href=\"|src=\"|value=\"';
        $reg = "#\b({$reg_tag}http[s]?://|{$reg_tag}ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
        preg_match_all($reg, $html, $matches);
        echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}", PHP_EOL;
        echo "{$cor->whit}[ INF ] [ URL EXTRACT ] {$cor->end}=>{$cor->grey1} {$url} {$cor->end}", PHP_EOL;
        $matches = array_unique(array_filter($matches[0]));
        $trash_list = $_SESSION["config"]['trash_list'];
        $trash_list = isset($_SESSION["config"]["webcache"]) ? str_replace('webcache.,', '', $trash_list) : $trash_list;

        foreach ($matches as $value):
            $value = __filterURLTAG($value);
            if (__validateURL($value) && !__validateOptions($trash_list, $value, 1)):
                echo "{$cor->whit}[  +  ] {$cor->end}[{$cor->red1} {$_SESSION["config"]['cont_url']}"
                . " {$cor->grey1}] {$value}{$cor->end}", PHP_EOL;
                $_SESSION["config"]["resultado_valores"].= $value.PHP_EOL;
                __plus();
                __saveValue($_SESSION["config"]["arquivo_output"], $value) . __plus();
                $_SESSION["config"]["cont_url"] ++;
            endif;
            __plus();
        endforeach;
        __timeSec('delay', PHP_EOL);
    endif;
}

function __extractURLDomainsArchive($domain) {
    if (__not_empty($domain)): 
        $cor = $GLOBALS['COR'];
        __plus();
        echo "{$cor->whit}[ INF ] [ URL EXTRACT ARCHIVE ] {$cor->end}=>{$cor->grey1} {$domain} {$cor->end}", PHP_EOL;
        $url = "http://web.archive.org/cdx/search/cdx?url=*.{$domain}/*&output=text&fl=original&collapse=urlkey";
        $matches = array_unique(array_filter(explode("\n", __request_info($url, null, null)['corpo'])));
        $trash_list = $_SESSION["config"]['trash_list'];

        foreach ($matches as $value):
            $value = __filterURLTAG($value);
            if (__validateURL($value) && !__validateOptions($trash_list, $value, 1)):
                echo "{$cor->whit}[  +  ] {$cor->end}[{$cor->red1} {$_SESSION["config"]['cont_url']}"
                . " {$cor->grey1}] {$value}{$cor->end}", PHP_EOL;
                $_SESSION["config"]["resultado_valores"].= $value.PHP_EOL;
                __plus();
                __saveValue($_SESSION["config"]["arquivo_output"], $value) . __plus();
                $_SESSION["config"]["cont_url"] ++;
            endif;
            __plus();
        endforeach;
        __timeSec('delay', PHP_EOL);
    endif;
}