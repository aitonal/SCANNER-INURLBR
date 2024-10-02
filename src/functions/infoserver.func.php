<?php

function __infoServer($url, $post_data = null) {

    $cor = $GLOBALS['COR'];
    $_SESSION['config']['verifica_info'] = 1;
    $result = __request_info($url, $_SESSION["config"]["proxy"], $post_data);
    
    if (isset($result['corpo'])):
        
        if (!is_null($_SESSION['config']['extrai-email'])):
            return __extractEmail($result['corpo'], $url);
        endif;

        if (!is_null($_SESSION['config']['extrai-url']) &&  !is_null($_SESSION['config']['extrai-url-archive'])):
            __extractURLs($result['corpo'], $url);
            __extractURLDomainsArchive($result['parser_url']['host']);
            return;
        endif;
        
        if (!is_null($_SESSION['config']['extrai-url-archive'])):
            return __extractURLDomainsArchive($result['parser_url']['host']);
        endif;

        if (!is_null($_SESSION['config']['extrai-url'])):
            return __extractURLs($result['corpo'], $url);
        endif;

        if (__not_empty($_SESSION['config']['regexp-filter'])):
            return __extractRegCustom($result['corpo'], $url);
        endif;

        if (__not_empty($_SESSION['config']['target']) && $_SESSION['config']['tipoerro'] == 5):
            return __checkURLs($result, $url);
        endif;
        
        $ifcode = __not_empty($_SESSION['config']['ifcode']) && strstr($result['server']['http_code'], $_SESSION['config']['ifcode']) ?
                "CODE_HTTP_FOUND: {$_SESSION['config']['ifcode']} / " : null;
        $ifredirect = __not_empty($_SESSION['config']['ifredirect']) &&
                (strstr($result['server']['redirect_url'], $_SESSION['config']['ifredirect'])) ?
                'VALUE URL REDIRECT FOUND' : null;

        $_SESSION['config']['title'] = __parse_title($result['corpo']);
        $_SESSION['config']['erroReturn'] = $ifredirect . $ifcode . __checkError($result['corpo']);
        $_SESSION['config']['curl_getinfo'] = $result['server'];
        $_SESSION['config']['error_conection'] = __not_empty($result['error']) ? $result['error'] : null;
        $_SESSION['config']['server_ip'] = !is_null($result['server']['primary_ip']) ? $result['server']['primary_ip'] : null;
        $_SESSION['config']['vull_style'] = __not_empty($_SESSION['config']['erroReturn']) ? "{$cor->gre}( POTENTIALLY VULNERABLE ){$cor->end} {$cor->gre1}" . __cli_beep() : null;
        $_SESSION['config']['result_values'].= __not_empty($_SESSION['config']['erroReturn']) ? $url.PHP_EOL : null;
        $_SESSION['config']['info_ip'] = __infoIP($result['server']['primary_ip'], 1);
        # TODO
        # $url_ = ($_SESSION['config']['alexa-rank']) ? ", RANK ALEXA: " . __positionAlexa($url) : null;
        __plus();
    else:
        return false;
    endif;
    __plus();
    if ($result['server']['primary_ip']):
        return "{$result['info']} , IP:{$result['server']['primary_ip']}:{$result['server']['primary_port']}";
    endif;
    return false;
}