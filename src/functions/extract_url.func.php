<?php

function __extractURLs($html, $url): void {
   if (__not_empty($url) && __not_empty($html)):
        __plus();
        $cor = $GLOBALS['COR'];
        $html = strtolower($html);
        echo "{$cor->whit}[ INF ] [ URL EXTRACT ] {$cor->end}=>{$cor->grey} {$url} {$cor->end}", PHP_EOL;
        __plus();
        $reg_tag = 'href=\"|src=\"|value=\"';
        $reg = "#\b({$reg_tag}http[s]?://|{$reg_tag}ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
        preg_match_all($reg, $html, $matches);

        if(is_array($matches) && __not_empty($matches[0])):
            $result = __array_filter_unique($matches[0]);
            if (is_array($result)):
                $result = array_map('__filterURLTAG', $result);
            endif;
            $result = __validate_trash($result);

            foreach ($result as $value):
                if (__validateURL($value)):
                    echo "{$cor->whit}[  +  ] [{$cor->end}{$cor->red1} {$_SESSION["config"]['cont_url']}"
                    . " {$cor->whit}]{$cor->grey} {$value}{$cor->end}", PHP_EOL;
                    $_SESSION["config"]["resultado_valores"].= $value.PHP_EOL;
                    __plus();
                    __saveValue($_SESSION["config"]["arquivo_output"], $value) . __plus();
                    $_SESSION["config"]["cont_url"] ++;
                endif;
                __plus();
            endforeach;
            __timeSec('delay', PHP_EOL);
        endif;
    endif;
}

function __extractURLDomainsArchive($domain): void {
    if (__not_empty($domain)): 
        $cor = $GLOBALS['COR'];
        __plus();
        echo "{$cor->whit}[ INF ] [ URL EXTRACT ARCHIVE ] {$cor->end}=>{$cor->grey1} {$domain} {$cor->end}", PHP_EOL;

        $url = "http://web.archive.org/cdx/search/cdx?url=*.{$domain}/*&output=text&fl=original&collapse=urlkey";
        $result = __array_filter_unique(explode("\n", __request_info($url, null, null)['corpo']));
        if(is_array($result) && __not_empty($result)):
            if (is_array($result)):
                $result = array_map('__filterURLTAG', $result);
            endif;
            $result = __validate_trash($result);
            
            foreach ($result as $value):
                if (__validateURL($value)):
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
    endif;
}