<?php

################################################################################
#This function removes the last regular expression ta###########################
################################################################################

function __filterURLTAG($valor = NULL) {
    if (__not_empty($valor)):
        return str_replace('"', '', str_replace('href="', '', str_replace('src="', '', str_replace('value="', '', $valor))));
    endif;
    return NULL;
}