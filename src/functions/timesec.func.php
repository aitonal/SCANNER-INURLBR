<?php

function __timeSec($camp, $value = NULL): void {
    $cor = $GLOBALS['COR'];
    echo!is_null($_SESSION['config'][$camp]) && 
    !empty($_SESSION['config'][$camp]) ? 
    "{$cor->whit}[ INF ]{$cor->end}{$cor->red2}[ TIME SEC/DELAY ]::{$cor->whit}{ {$cor->blue}[ {$_SESSION['config'][$camp]} ]{$cor->whit} }{$cor->end}{$value}" : null;
    !is_null($_SESSION['config'][$camp]) ?
     sleep($_SESSION['config'][$camp]) : null;
}
