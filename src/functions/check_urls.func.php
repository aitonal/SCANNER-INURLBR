<?php
function __checkURLs($resultado, $url_) {
    $cor = $GLOBALS['COR'];
    __plus();
    $code = !is_null($_SESSION["config"]["ifcode"]) ? $_SESSION["config"]["ifcode"] : 200;
    $valor = ($resultado['server']['http_code'] == $code) ? "{$cor->gre}" : NULL;

    echo PHP_EOL."{$cor->whit}  |_[ INF ]{$cor->end}[{$cor->whit} {$_SESSION['config']['cont_valores']} {$cor->end}]".PHP_EOL;
    echo "{$cor->whit}  |_[ INF ][URL] {$cor->end}::{$cor->grey1}{$valor} {$url_} {$cor->end}".PHP_EOL;
    echo "{$cor->whit}  |_[ INF ][STATUS]::{$valor} {$resultado['server']['http_code']} {$cor->end}".PHP_EOL;

    __timeSec('delay');
    echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}";
    __plus();

    $target_ = ['url_clean' => $url_, 'url_xpl' => $url_];

    if ($resultado == $code):

        $_SESSION['config']['resultado_valores'].= $url_.PHP_EOL;
        __saveValue($_SESSION["config"]["arquivo_output"], $url_);
        __plus();

        (__not_empty($_SESSION['config']['sub-file']) &&
                is_array($_SESSION['config']['sub-file']) ? __subExecExploits($target_['url_xpl'], $_SESSION['config']['sub-file']) : NULL);
        __plus();

        (__not_empty($_SESSION['config']['command-vul']) ? __command($_SESSION['config']['command-vul'], $target_) : NULL);
        __plus();

        (__not_empty($_SESSION['config']['exploit-vul-id']) ?
                        __configExploitsExec($_SESSION['config']['exploit-vul-id'], $target_) : NULL);
        __plus();
    endif;

    (__not_empty($_SESSION['config']['exploit-all-id']) ? __configExploitsExec($_SESSION['config']['exploit-all-id'], $target_) : NULL);
    __plus();

    (__not_empty($_SESSION['config']['command-all']) ? __command($_SESSION['config']['command-all'], $target_) : NULL);
    __plus();

    $_SESSION['config']['cont_valores'] ++;

    __plus();
}