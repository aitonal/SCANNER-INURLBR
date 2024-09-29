<?php

function __extract_ip($ip){
    if($ip):
        //ipv4
        preg_match_all('#^(\d{1,3}\.){3}\d{1,3}$#', trim($ip), $ret);
        if($ret[0][0]):
            return $ret[0][0];
        endif;
        //ipv6
        preg_match_all('#^(((?=(?>.*?(::))(?!.+\3)))\3?|([\dA-F]{1,4}(\3|:(?!$)|$)|\2))(?4){5}((?4){2}|((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?7)){3})$#i', trim($ip), $ret);
        if($ret[0][0]):
            return $ret[0][0];
        endif;
    endif;
    return false;
}

function __infoIP($ip, $op = 0) {
        if(__not_empty($_SESSION['config']['token_ipinfo'][0]) && __not_empty($ip)):
            $ip_extracted = __extract_ip($ip);
            if (filter_var($ip_extracted, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) || filter_var($ip_extracted, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)):
            $url_request = "https://ipinfo.io/{$ip_extracted}/json?token={$_SESSION['config']['token_ipinfo'][0]}";
                if (filter_var($ip_extracted, FILTER_VALIDATE_IP)):
                    if ($op == 0):
                        $request = __request_info($url_request, $_SESSION["config"]["proxy"], null);
                        __plus();
                        return json_decode($request['corpo'], true);
                    else:
                        $_SESSION['config']['verifica_info'] = null;
                        $request = __request_info($url_request, $_SESSION["config"]["proxy"], null);
                        $return = json_decode($request['corpo'], true);
                        __plus();
                        return "{$return['city']}, {$return['country']}, {$return['hostname']}, {$return['org']}";
                    endif;
                endif;
            endif;
        endif;
    return false;
}