<?php

function __startingBanner(): void {
    $cor = $GLOBALS['COR'];    
    echo PHP_EOL, "[ WRN ] Starting SCANNER INURLBR {$_SESSION['config']['version_script']} at [" . date("d-m-Y H:i:s") . "]
[ WRN ] legal disclaimer: Usage of INURLBR for attacking targets without prior mutual consent is illegal. 
[ WRN ] It is the end user's responsibility to obey all applicable local, state and federal laws.
[ WRN ] Developers assume no liability and are not responsible for any misuse or damage caused by this program.{$cor->end}", PHP_EOL;

    $file = __not_empty($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : null;
    $file_all = __not_empty($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : null;
    $command = __not_empty($_SESSION['config']['command-vul']) ? $_SESSION['config']['command-vul'] : $_SESSION['config']['command-all'];
    $subcommand = __not_empty($_SESSION['config']['sub-cmd-vul']) ? $_SESSION['config']['sub-cmd-vul'] : $_SESSION['config']['sub-cmd-all'];

    echo (__not_empty($_SESSION['config']['ifemail']) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ FILTER EMAIL ]::{$cor->whit}[ {$_SESSION['config']['ifemail']} ]{$cor->end}" : null);

    echo (is_array($_SESSION['config']['dork-file']) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ DORK FILE ]::{$cor->whit}[ {$_SESSION['config']['dork-file']} ]{$cor->end}" : null);

    echo (__not_empty($_SESSION['config']['dork-rand']) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ DORKS GENERATED ]::{$cor->whit}[ {$_SESSION['config']['dork-rand']} ]{$cor->end}" : null);

    echo (is_array($_SESSION['config']['irc']['conf']) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ SEND VULN IRC ]::{$cor->whit}[ server: {$_SESSION['config']['irc']['conf'][0]} / channel: {$_SESSION['config']['irc']['conf'][1]} ]{$cor->end}" : null);

    echo (__not_empty($_SESSION['config']['ifurl']) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ FILTER URL ]::{$cor->whit}[ {$_SESSION['config']['ifurl']} ]{$cor->end}" : null);

    echo (__not_empty($file) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ OUTPUT FILE ]::{$cor->whit} [ {$_SESSION['config']['out_put_paste']}{$file}  ]{$cor->end}" : null);

    echo (__not_empty($file_all) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ OUTPUT FILE ALL ]:: {$cor->whit}[ {$_SESSION['config']['out_put_paste']}{$file_all}  ]{$cor->end}" : null);

    echo (__not_empty($command) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ DEFINED EXTERNAL COMMAND ]::{$cor->whit} [ $command ]{$cor->end}" : null);

    echo (__not_empty($subcommand) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ DEFINED EXTERNAL SUB_COMMAND ]::{$cor->whit} [ $subcommand ]{$cor->end}" : null);

    echo (__not_empty($_SESSION['config']['proxy-file']) ?
            PHP_EOL."{$cor->whit}[ INF ] {$cor->red2}[ FILE SOURCE LIST OF PROXY ]::{$cor->whit} [ {$_SESSION['config']['proxy-file']} ]{$cor->end}" : NULL);
}