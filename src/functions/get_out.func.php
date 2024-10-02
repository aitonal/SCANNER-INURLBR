<?php


function __getOut($msg): never {
    $cor = $GLOBALS['COR'];
    (!function_exists('__ircQuit') ? null :
    __ircQuit($_SESSION['config']['irc']));
    print_r($msg);
    echo $cor->end;
    __plus();
    exit(1);
}