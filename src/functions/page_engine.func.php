<?php

function __pageEngine($confArray, $motorNome, $motorURL, $dork, $postDados, $pagStart, $pagLimit, $pagIncrement, $pagStart2 = null, $pagIncrement2 = null) {

    $cor = $GLOBALS['COR'];
    $motorNome = preg_replace('/\s+/', ' ', $motorNome);
    echo PHP_EOL, "{$cor->whit}[ INF ]{$cor->end}{$cor->red2} [ ENGINE ]:: {$cor->whit}[ {$motorNome} ]{$cor->end}";
    echo (!is_null($_SESSION['config']['max_pag']) ? ("{$cor->whit}[ INF ] {$cor->end}{$cor->red2}[ LIMIT PAG ]:: {$cor->whit}[ {$_SESSION['config']['max_pag']} ]{$cor->end}".PHP_EOL) : null);
    $http_proxy = __not_empty($_SESSION['config']['proxy-http-file']) || __not_empty($_SESSION['config']['proxy-http']) ? __proxyHttpRandom() : null;
    echo __not_empty($http_proxy) ? PHP_EOL."{$cor->whit}[ INF ]{$cor->end}{$cor->red2}[ HTTP_PROXY ]:: {$http_proxy}{$cor->end}".PHP_EOL : null;
    __plus();

    $contMaxpg = 0;
    $pagStart2_local = $pagStart2;
    $pagStart3_local = $pagStart2;
    while ($pagStart <= $pagLimit):
        
        $proxy_list_rand = __not_empty($confArray["list_proxy_rand"]) && !__not_empty($_SESSION['config']['time-proxy']) ? $confArray["list_proxy_rand"] : $_SESSION["config"]["proxy"];
        $proxy = __not_empty($_SESSION['config']['proxy-file']) && __not_empty($_SESSION['config']['time-proxy']) ? __timeSecChangeProxy($confArray["list_proxy_file"]) : $proxy_list_rand;

        $url_replaced_str = str_replace("[DORK]", $dork, $motorURL);
        $url_replaced_str = str_replace("[PAG]", $pagStart, $url_replaced_str);
        $url_replaced_str = str_replace("[PAG2]", $pagStart2_local, $url_replaced_str);
        $url_replaced_str = str_replace("[PAG3]", $pagStart3_local, $url_replaced_str);
        $url_replaced_str = str_replace("[RANDOM]", base64_encode(intval(rand() % 255) . intval(rand() % 2553333)), $url_replaced_str);
        $url_replaced_str = str_replace("[IP]", intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255), $url_replaced_str);

        $postdata_url_query = !is_null($postDados) ? __convertUrlQuery(parse_url(urldecode($url_replaced_str), PHP_URL_QUERY)) : null;
        
        __debug(['debug' => "[ URL ENGINE ]{$http_proxy}{$url_replaced_str}", 'function' => __FUNCTION__], 1);
        __plus();

        $target_http_prxy[] = "{$http_proxy}{$url_replaced_str}";

        $pagStart = $pagStart + $pagIncrement;
        $pagStart2_local = $pagStart2_local + $pagIncrement;
        $pagStart3_local = $pagStart3_local + $pagIncrement2;
        $contMaxpg++;
        __timeSec('delay');

        if (!is_null($_SESSION['config']['max_pag']) && $_SESSION['config']['max_pag'] == $contMaxpg):
            break;
        endif;
        
    endwhile;

    $_SESSION['config']['url_list_engine'] =  [ $target_http_prxy , $proxy, $postdata_url_query, $motorNome ];
}

