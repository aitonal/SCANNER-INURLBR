<?php
################################################################################
#GET STATUS HTTP URL############################################################
################################################################################
function __getStatusURL($url) {
    if (__not_empty($url))
        return false;
    __plus();
    $status = [];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    $result_curl = curl_exec($curl);
    if ($result_curl):
        preg_match_all('(HTTP.*)', $result_curl, $status['http']) . __plus();
        return (!is_null($status['http']) && !empty($status['http'])) ? true : false;
    endif;
    unset($curl);
    return false;
}