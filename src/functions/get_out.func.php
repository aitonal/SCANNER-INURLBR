<?php


function __getOut($msg) {
    $cor = $GLOBALS['COR'];
    (!function_exists('__ircQuit') ? null :
    __ircQuit($_SESSION['config']['irc']));
    print_r($msg);
    print($cor->end);
    exit(1);
}