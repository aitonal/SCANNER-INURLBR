<?php

function __timeSec($camp, $value = NULL) {

    echo!is_null($_SESSION['config'][$camp]) && 
    !empty($_SESSION['config'][$camp]) ? 
    "{$cor->whit}[ INF ]{$cor->end}{$cor->red2}[ TIME SEC/DELAY ]::{$cor->whit}{ {$cor->blue}[ {$_SESSION['config'][$camp]} ]{$cor->whit} }{$cor->end}{$value}" : NULL;
    !is_null($_SESSION['config'][$camp]) ?
     sleep($_SESSION['config'][$camp]) : NULL;
}
