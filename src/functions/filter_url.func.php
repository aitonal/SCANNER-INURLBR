<?php

################################################################################
#FILTER HTML URLs ALL THE RETURN OF seekers#####################################
################################################################################
function __filterURL($html, $op = null) {
    if (__not_empty($html)):
        $cor = $GLOBALS['COR'];
        if (strstr($html, 'www.google.com/sorry/index?continue=https://www.google') &&  __not_empty($_SESSION['config']['persist'])):
            echo "{$cor->whit}[ INF ][ ERROR ]{$cor->yell} GOOGLE LOCKED!{$cor->end}", PHP_EOL;
            $rand_host = __dominioGoogleRandom();
            $_SESSION['config']['persist']--;
            __pageEngine($_SESSION["config"]["conf_array_tmp"],  "GOOGLE - {$rand_host}", "https://{$rand_host}/search?q=[DORK]&num=1500&btnG=Search&pws=1", $_SESSION["config"]["dork_tmp"], null, 0, 0, 1);
            __process_request_engine(...$_SESSION['config']['url_list_engine']);
            return; 
        endif;

        $reg_1 =  "#\b(href=\"|src=\"|value=\"http[s]?://|href=\"|src=\"|value=\"ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
        $reg_2 =  "#\b(?i)\b((?:http[s]?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))#smxi";  
        
        $html = str_replace(['href="/url?url=','href="/url?q='], 'href="', $html);

        # VALIDATION LYCOS URL / REMOVE HTML JUNK
        if(strstr($html, 'lycos.com')):
            $html = __remove_lycos_html_junk($html);
        endif;

        $_SESSION["config"]["google_attempt"][1] = 0;

        preg_match_all($reg_1, $html, $html_1);
        preg_match_all($reg_2, $html, $html_2);
        $result = array_merge($html_2,$html_1)[0];
        $result = array_map('urldecode', $result);
        $result = __array_filter_unique($result);

        # VALIDATION GOOGLE URL / REMOVE HTML JUNK
        if(strstr($html, 'https://policies.google.com')):
            $result = __remove_google_html_junk($result);
        endif;

        # ADD HTTP
        $result = array_map('__add_scheme', $result);

        return __array_filter_unique($result);
    endif;
}
################################################################################
#FILTER IF URL DOMAIN###########################################################
################################################################################
function __filterURLif($result) {
    if (__not_empty($result) && is_array($result)):
        foreach ($result as $value):
            $temp[] = __not_empty($_SESSION['config']['ifurl']) && strstr($value, $_SESSION['config']['ifurl']) ? $value : null;
        endforeach;
        return __array_filter_unique($temp);
    endif;
    return false;
}
################################################################################
#FILTER HTML URLs ALL THE RETURN OF GOOGLE API##################################
################################################################################
function __filterURLJson($html) {
    if (__not_empty($html)):
        $tmp = [];
        $html = json_decode($html, true);
        $allresponseresults = $html['responseData']['results'];
        foreach ($allresponseresults as $value):
            $tmp[] = $value['url'];
        endforeach;
        return __array_filter_unique($tmp);
    endif;
}

################################################################################
#FILTER HTML JUNK URLs ALL THE RETURN OF GOOGLE#################################
################################################################################
function __split_google_junk($value){
    if($value): 
         $result = explode($_SESSION['config']['url_encode_remove'], $value);
         if (isset($result[0])):
                 return $result[0];
         endif;
     endif;
 }
 
################################################################################
#FILTER HTML JUNK URLs ALL THE RETURN OF GOOGLE#################################
################################################################################
function __remove_google_html_junk($result){
    $remove_google_strings = ['&amp;','\x26amp','\x3d100'];
    foreach ($remove_google_strings as $string):
        $_SESSION['config']['url_encode_remove'] = $string;
        $result = array_map('__split_google_junk', $result);
    endforeach;
    return $result;
}
################################################################################
#FILTER HTML JUNK URLs ALL THE RETURN OF LYVOS##################################
################################################################################
function __remove_lycos_html_junk($html){
    $html = str_replace('<span class="result-url">', 'https://', $html);
    return $html;
}