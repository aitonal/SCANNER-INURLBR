<?php

################################################################################
#This function will filter and mail each url####################################
################################################################################
function __filterEmailif($results) {
    if (__not_empty($results) && is_array($results)):
        $cor = $GLOBALS['COR'];
        echo "{$cor->whit}|_[  !  ][ INF ]{$cor->red2}[ FILTERING VALUE ]::{$cor->whit}[ {$_SESSION["config"]['ifemail']} ]{$cor->end}", PHP_EOL;
        __plus();
        foreach ($results as $value):
            $temp[] = strstr($value, $_SESSION['config']['ifemail']) ? $value : null;
        endforeach;
        return __array_filter_unique($temp);
    endif;
    return false;
}