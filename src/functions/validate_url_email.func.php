<?php

################################################################################
#This function will validate emails#############################################
################################################################################
function __validateEmail($email) {
    if(__not_empty($email)):
        preg_match_all('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/', $email, $matches);
        return $matches;
    endif;
}

################################################################################
#This function will validate URLS###############################################
################################################################################
function __validateURL($url) {
    if(__not_empty($url)):
        if (preg_match("#\b(http[s]?://|ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si", $url)):
            return true;
        else:
            return false;
        endif;
    endif;
}