<?php

################################################################################
#This function will filter and mail each url####################################
################################################################################
function __filterEmailif($resultados) {

    if (is_array($resultados)) {
        $cor = $GLOBALS['COR'];
        echo "{$cor->whit}|_[  !  ][ INF ]{$cor->red2}[ FILTERING VALUE ]::{$cor->whit}[ {$_SESSION["config"]['ifemail']} ]{$cor->end}".PHP_EOL;
        foreach ($resultados as $value) {

            $temp[] = (strstr($value, $_SESSION['config']['ifemail']) ? $value : NULL);
        }

        return array_unique(array_filter($temp));
    }

    RETURN FALSE;
}