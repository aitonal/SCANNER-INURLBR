<?php

function __debug($value, $op = null): string|null {
    $cor = $GLOBALS['COR'];
    if (isset($_SESSION["config"]["debug"]) && __validateOptions($_SESSION["config"]["debug"], $op)): 
        $msg = PHP_EOL."{$cor->whit}[ INF ] [ FUNCTION ] => {$cor->cya}{$value['function']}{$cor->whit} ".PHP_EOL."{$cor->yell}[ DEBUG ] => ".$value['debug'].$cor->end;
        return print_r($msg);
    endif;
    return null;
}