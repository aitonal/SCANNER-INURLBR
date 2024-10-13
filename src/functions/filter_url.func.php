<?php

################################################################################
#EXTRACT URLS USING REGEX#######################################################
################################################################################
function __extract_url($content): array|bool{
    if(__not_empty($content)):
        $reg_1 =  "#\b(href=\"|src=\"|value=\"http[s]?://|href=\"|src=\"|value=\"ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#smxi";
        $reg_2 =  "#\b(?i)\b((?:http[s]?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))#smxi";  
        preg_match_all($reg_1, $content, $html_1);
        preg_match_all($reg_2, $content, $html_2);
        $result = array_merge($html_2,$html_1);
        foreach($result as $url):
            $url_array[] = str_replace('"/','', $url);
        endforeach;
        $url_array = __array_filter_unique($url_array);
        if(__not_empty($url_array)):
            return $url_array[0];
        endif;
    endif;
    return false;
}

################################################################################
#FILTER HTML URLs ALL THE RETURN################################################
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

        $html = str_replace(['href="/url?url=','href="/url?q='], 'href="', $html);

        # VALIDATION LYCOS URL / REMOVE HTML JUNK
        if(strstr($html, 'lycos.com')):
            $html = __remove_lycos_html_junk($html);
        endif;

        $_SESSION["config"]["google_attempt"][1] = 0;


        $result = __extract_url($html);

        if(is_array($result)):
            $result = array_map('urldecode', $result);
            $result = array_map('__replace_space_encode', $result);
        endif;

        $result = __array_filter_unique($result);

        # VALIDATION YAHOO URL / REMOVE HTML JUNK
        if(strstr($html, 'https://r.search.yahoo.com/_ylt=')):
            $result = array_map('urldecode', $result);
            $result = array_map(function($value) {
                return explode('/RU=',$value)[1];
            }, $result);

            $result = array_map(function($value) {
                return explode('/RK=2',$value)[0];
            }, $result);

            $result = __array_filter_unique($result);
        endif;

        # VALIDATION GOOGLE URL / REMOVE HTML JUNK
        if(strstr($html, 'https://policies.google.com')):
            $remove_google_strings = ['&amp;','\x26amp','\x3d100'];
            $result = __remove_html_junk($result, $remove_google_strings);
        endif;

        # VALIDATION BING URL / REMOVE HTML JUNK
        if(strstr($html, 'https://www.bing.com/')):
            $remove_bing_strings = ['#:~:text=','…'];
            $result = __remove_html_junk($result, $remove_bing_strings);
        endif;

        # ADD HTTP
        if(is_array($result)):
            $result = array_map('__add_scheme', $result);
        endif;

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
#FILTER HTML JUNK URLs ALL THE RETURN OF HTML###################################
################################################################################
function __split_junk($value){
    if($value): 
         $result = explode($_SESSION['config']['url_encode_remove'], $value);
         if (isset($result[0])):
                 return $result[0];
         endif;
     endif;
 }
 
################################################################################
#FILTER HTML JUNK URLs##########################################################
################################################################################
function __remove_html_junk($result, $remove_strings){
    foreach ($remove_strings as $string):
        $_SESSION['config']['url_encode_remove'] = $string;
        if (is_array($result)):
            $result = array_map('__split_junk', $result);
        endif;
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

################################################################################
#REPLACE SPACE TO ENCODE %20####################################################
################################################################################
function __replace_space_encode($url){
    $url = str_replace(' ', '%20', $url);
    return $url;
}