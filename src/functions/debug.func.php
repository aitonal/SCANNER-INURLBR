<?php

function __debug($value, $op = null) {
    if (isset($_SESSION["config"]["debug"]) && __validateOptions($_SESSION["config"]["debug"], $op)): 
        return PHP_EOL."[ INF ][ FUNCTION ]=>{$value['function']}[ DEBUG ] => ".PHP_EOL . print_r($value['debug']).PHP_EOL;
    endif;
    return null;
}