<?php
function __infoIP($ip, $op = 0): mixed {
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