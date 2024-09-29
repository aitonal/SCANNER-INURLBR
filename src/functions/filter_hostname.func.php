<?php

function __filterHostname($url) {
    if(__not_empty($url)):
        $target = null;
        //#\b((((ht|f)tps?://*)|(www|ftp)\.)[a-zA-Z0-9-\.]+)#i - 1.0
        preg_match_all('@^(?:(ht|f)tps?://*)?([^/]+)@i', $url, $target);
        return str_replace("/", '', str_replace("ftps:", '', str_replace("ftp:", '', str_replace("https:", '', str_replace("http:", '', $target[0][0])))));
    endif;
}