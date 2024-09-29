<?php

function __command($cmd_shell_param, $target) {
    if (!is_null($cmd_shell_param)):
        $cor = $GLOBALS['COR'];
        (
            strstr($cmd_shell_param,    '_TARGET_')      ||
            strstr($cmd_shell_param,    '_TARGETFULL_')  ||
            strstr($cmd_shell_param,    '_TARGETIP_')    ||
            strstr($cmd_shell_param,    '_EXPLOIT_')     ||
            strstr($cmd_shell_param,    '_URI_')         ||
            strstr($cmd_shell_param,    '_URI_')         ||
            strstr($cmd_shell_param,    '_PORT_')        ||
            strstr($cmd_shell_param,    '_RANDOM_') ? NULL :
                __getOut("{$cor->whit}[ ERR ] {$cor->yell}SET PARAMETER - command correctly{$cor->end}".PHP_EOL)
        );

        $uri = parse_url($target['url_xpl']);

        $cmd['style'] = str_replace("_TARGET_", "{$cor->cya1}" . __filterHostname($target['url_xpl']) . "{$cor->whit}", $cmd_shell_param);
        $cmd['style'] = str_replace('_TARGETIP_', "{$cor->cya}{$_SESSION['config']['server_ip']}{$cor->whit}", $cmd['style']);
        $cmd['style'] = str_replace('_TARGETFULL_', "{$cor->red}{$target['url_clean']}{$cor->whit}", $cmd['style']);
        $cmd['style'] = str_replace('_TARGETXPL_', "{$cor->red1}{$target['url_xpl']}{$cor->whit}", $cmd['style']);
        $cmd['style'] = str_replace("_EXPLOIT_", "{$cor->red2}{$_SESSION['config']['exploit-command']}{$cor->whit}", $cmd['style']);
        $cmd['style'] = str_replace('_URI_', "{$cor->blue}{$uri['path']}{$cor->whit}", $cmd['style']);
        $cmd['style'] = str_replace('_PORT_', "{$cor->mag1}{$target['url_port']}{$cor->whit}", $cmd['style']);
        $cmd['style'] = str_replace('_RANDOM_', "{$cor->blu1}" . random(5) . "{$cor->whit}", $cmd['style']);
        $cmd['style'] = __crypt($cmd['style']);

        $cmd['format'] = str_replace("_TARGET_", __filterHostname($target['url_clean']), $cmd_shell_param);
        $cmd['format'] = str_replace('_TARGETIP_', $_SESSION['config']['server_ip'], $cmd['format']);
        $cmd['format'] = str_replace('_TARGETFULL_', $target['url_clean'], $cmd['format']);
        $cmd['format'] = str_replace('_TARGETXPL_', $target['url_xpl'], $cmd['format']);
        $cmd['format'] = str_replace("_EXPLOIT_", $_SESSION['config']['exploit-command'], $cmd['format']);
        $cmd['format'] = str_replace("_URI_", $uri['path'], $cmd['format']);
        $cmd['format'] = str_replace("_PORT_", $target['url_port'], $cmd['format']);
        $cmd['format'] = str_replace("_RANDOM_", random(5), $cmd['format']);
        $cmd['format'] = str_replace("\n", '', str_replace("\r", '', $cmd['format']));
        $cmd['format'] = __crypt($cmd['format']);

        echo PHP_EOL, "{$cor->whit}[ CMD ]__", PHP_EOL;
        echo "         |[ EXTERNAL COMMAND ]:: {$cmd['style']}{$cor->mag1}", PHP_EOL;
        __plus();
        $xterm = [
            'popup' => ($_SESSION['config']['popup']) ? 'sudo xterm -geometry 134x50+1900+0 -title "Auxiliary Window - INURLBR / COMMAND" -e ' : null, 
            'devnull' => ($_SESSION['config']['popup']) ? ' > /dev/null &' : null
        ];
        echo $_SESSION['config']['popup'] ? "\t[!] opening auxiliary window...".PHP_EOL : null;
        __plus();
        $dados = system($xterm['popup'] . $cmd['format'] . $xterm['devnull'], $dados);
        sleep(1);
        __plus();
        echo $cor->end;
    endif;
    if (empty($dados[0])):
        return FALSE;
    endif;
    unset($dados);
}