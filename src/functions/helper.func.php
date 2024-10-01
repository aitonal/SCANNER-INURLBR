<?php

#################################################################################
#SECURITIES VALIDATION DOUBLE####################################################
#################################################################################
function __not_empty($value = null): bool {
    return !is_null($value) && !empty($value) && $value !=="" ? true : false;
}

#################################################################################
#SECURITIES VALIDATION DOUBLE####################################################
#################################################################################
function __validate_trash($result){
    if (__not_empty($result)):
        $trash_list = $_SESSION['config']['trash_list'];
        $trash_list = explode("\n", $trash_list);
        if(__not_empty($trash_list)):
            $regex = implode("|", $trash_list);
            $data = preg_grep("({$regex})", $result);
            $data = array_diff($result,$data);
            return $data;
        endif;
    endif;
}

#################################################################################
#SECURITIES VALIDATION DOUBLE####################################################
#################################################################################
function __array_filter_unique($array) {
    if (__not_empty($array)):
        return array_filter(array_unique($array));
    endif;
}

################################################################################
#SCHEMA VALIDATION##############################################################
################################################################################
function __add_scheme($value){
    if(__not_empty($value)):
     if(!strstr($value, 'http')):
         $value = "https://{$value}";
         return $value;
     endif;
    endif;
    return $value;
 }


################################################################################
#REMOVE VALUE URL###############################################################
################################################################################
function __remove($value, $url): array|string {
    return str_replace($value, '', $url);
}

################################################################################
#FUNCTION TO USE FIBER##########################################################
################################################################################
# https://www.php.net/manual/pt_BR/language.fibers.php
# https://www.php.net/manual/pt_BR/class.fiber.php
function __fiber_simples($function , $args) {
    $fiber = new Fiber($function(...));
    $fiber->start(...$args);
    return $fiber->getReturn();
}

################################################################################
#FUNCTION USED IN ARRAY_FILTER##################################################
################################################################################
function __filterEmptyArray($var){
    if(__not_empty($var)):
        $var = trim($var);
        return $var !== null && $var !== false && $var !== "" && isset($var) && !empty($var);
    endif;
}

################################################################################
#GENERATE RANDOM STRING#########################################################
################################################################################
#(PHP4,PHP5) Shuffle an array http://php.net/manual/en/function.shuffle.php
function random(int $len) {
    if(__not_empty($len)):
        $len = substr(md5(mt_rand()), 0, $len);
    endif;
    return $len;
}

################################################################################
#This function will validate emails#############################################
################################################################################
function __validateEmail($email): bool {
    if(__not_empty($email)):
        if (filter_var($email, FILTER_VALIDATE_EMAIL)):
            return true;
        endif;
        #if(preg_match('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/', $email)):
        #    return true;
        #endif;
    endif;
    return false;
}

################################################################################
#This function will validate URLS###############################################
################################################################################
function __validateURL($url): bool {
    if(__not_empty($url)):
        if (filter_var($url, FILTER_VALIDATE_URL)):
            return true;
        endif;
        if (preg_match("#\b(http[s]?://|ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#sUi", $url)):
            return true;
        endif;
    endif;
    return false;
}

################################################################################
#This function removes the last regular expression   ###########################
################################################################################
function __filterURLTAG($valor = null) {
    if (__not_empty($valor)):
        return str_replace('"', '', str_replace('href="', '', str_replace('src="', '', str_replace('value="', '', $valor))));
    endif;
    return null;
}

################################################################################
#REMOVE TARGET URL #############################################################
################################################################################
function __replace_url_value($url): array|string{
    # http://click.hotbusca.com/clk.php?url=https://groups.drupal.org/node/477438
    return str_replace('http://click.hotbusca.com/clk.php?url=','',$url);
}

################################################################################
#GET TITLE FROM HTML ###########################################################
################################################################################
function __parse_title($html): string|null {
    $matches = [];
	
	preg_match_all("/<title.*>(.*)<\/title>/iUs", $html, $matches);
	if (count($matches) > 1):
		$title = trim(str_replace("\n","",$matches[1][0]));
		return $title;
    else:
		return null;
	endif;
}