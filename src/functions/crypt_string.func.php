<?php

################################################################################
#Base64 string encryption md5 , hexadecimal, hex, base64 & random string########
################################################################################
function __crypt($url) {
    if(__not_empty($url)):
        preg_match_all("#(md5|base64|hex|random)(\()(.*?)(\))#", $url, $matches);
        $cont = 0;
        foreach ($matches[0] as $replace):
            if (strstr($replace, 'md5(')):
                $func = 'md5';
            endif;

            if (strstr($replace, 'base64(')):
                $func = 'base64_encode';
            endif;

            if (strstr($replace, 'hex(')):
                $func = 'bin2hex';
            endif;

            if (strstr($replace, 'random(')):
                $func = 'random';
            endif;

            $url = str_replace($replace, $func($matches[3][$cont]), $url);
            $cont ++;
        endforeach;
    endif;
    return $url;
    
}