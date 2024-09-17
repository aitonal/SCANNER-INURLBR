<?php

function __startingBanner() {

    echo PHP_EOL."[ WRN ] Starting SCANNER INURLBR {$_SESSION['config']['version_script']} at [" . date("d-m-Y H:i:s") . "]
[ WRN ] legal disclaimer: Usage of INURLBR for attacking targets without prior mutual consent is illegal. 
[ WRN ] It is the end user's responsibility to obey all applicable local, state and federal laws.
[ WRN ] Developers assume no liability and are not responsible for any misuse or damage caused by this program.{$_SESSION["c0"]}".PHP_EOL;

    $file = __not_empty($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : NULL;
    $file_all = __not_empty($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : NULL;
    $command = __not_empty($_SESSION['config']['command-vul']) ? $_SESSION['config']['command-vul'] : $_SESSION['config']['command-all'];
    $subcommand = __not_empty($_SESSION['config']['sub-cmd-vul']) ? $_SESSION['config']['sub-cmd-vul'] : $_SESSION['config']['sub-cmd-all'];

    echo (__not_empty($_SESSION['config']['ifemail']) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ FILTER EMAIL ]::{$_SESSION["c1"]}[ {$_SESSION['config']['ifemail']} ]{$_SESSION["c0"]}" : NULL);

    echo (is_array($_SESSION['config']['dork-file']) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ DORK FILE ]::{$_SESSION["c1"]}[ {$_SESSION['config']['dork-file']} ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($_SESSION['config']['dork-rand']) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ DORKS GENERATED ]::{$_SESSION["c1"]}[ {$_SESSION['config']['dork-rand']} ]{$_SESSION["c0"]}" : NULL);

    echo (is_array($_SESSION['config']['irc']['conf']) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ SEND VULN IRC ]::{$_SESSION["c1"]}[ server: {$_SESSION['config']['irc']['conf'][0]} / channel: {$_SESSION['config']['irc']['conf'][1]} ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($_SESSION['config']['ifurl']) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ FILTER URL ]::{$_SESSION["c1"]}[ {$_SESSION['config']['ifurl']} ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($file) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ OUTPUT FILE ]::{$_SESSION["c1"]} [ {$_SESSION['config']['out_put_paste']}{$file}  ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($file_all) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ OUTPUT FILE ALL ]:: {$_SESSION["c1"]}[ {$_SESSION['config']['out_put_paste']}{$file_all}  ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($command) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ DEFINED EXTERNAL COMMAND ]::{$_SESSION["c1"]} [ $command ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($subcommand) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ DEFINED EXTERNAL SUB_COMMAND ]::{$_SESSION["c1"]} [ $subcommand ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($_SESSION['config']['proxy-file']) ?
            PHP_EOL."{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ FILE SOURCE LIST OF PROXY ]::{$_SESSION["c1"]} [ {$_SESSION['config']['proxy-file']} ]{$_SESSION["c0"]}" : NULL);
}