<?php

function __debug($valor, $op = NULL) {
    if (isset($_SESSION["config"]["debug"]) && __validateOptions($_SESSION["config"]["debug"], $op)): 
        return PHP_EOL."[ INF ][ FUNCTION ]=>{$valor['function']}[ DEBUG ] => \n" . print_r($valor['debug']).PHP_EOL;
    endif;
    return NULL;
}