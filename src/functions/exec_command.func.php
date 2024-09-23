<?php

function __command($commando, $alvo) {
    if (!is_null($commando)):
        $cor = $GLOBALS['COR'];
        (strstr($commando, '_TARGET_')              ||
                strstr($commando, '_TARGETFULL_')   ||
                strstr($commando, '_TARGETIP_')     ||
                strstr($commando, '_EXPLOIT_')      ||
                strstr($commando, '_URI_')          ||
                strstr($commando, '_URI_')          ||
                strstr($commando, '_PORT_')         ||
                strstr($commando, '_RANDOM_') ? NULL :
                        __getOut("{$cor->whit}[ ERR ]{$cor->yell}SET PARAMETER - command correctly{$cor->end}\n"));

        $uri = parse_url($alvo['url_xpl']);

        $command[0] = str_replace("_TARGET_", "{$cor->cya1}" . __filterHostname($alvo['url_xpl']) . "{$cor->whit}", $commando);
        $command[0] = str_replace('_TARGETIP_', "{$cor->cya}{$_SESSION['config']['server_ip']}{$cor->whit}", $command[0]);
        $command[0] = str_replace('_TARGETFULL_', "{$cor->red}{$alvo['url_clean']}{$cor->whit}", $command[0]);
        $command[0] = str_replace('_TARGETXPL_', "{$cor->red1}{$alvo['url_xpl']}{$cor->whit}", $command[0]);
        $command[0] = str_replace("_EXPLOIT_", "{$cor->red2}{$_SESSION['config']['exploit-command']}{$cor->whit}", $command[0]);
        $command[0] = str_replace('_URI_', "{$cor->blue}{$uri['path']}{$cor->whit}", $command[0]);
        $command[0] = str_replace('_PORT_', "{$cor->mag2}{$alvo['url_port']}{$cor->whit}", $command[0]);
        $command[0] = str_replace('_RANDOM_', "{$cor->blu1}" . random(5) . "{$cor->whit}", $command[0]);

        $command[0] = __crypt($command[0]);

        $command[1] = str_replace("_TARGET_", __filterHostname($alvo['url_clean']), $commando);
        $command[1] = str_replace('_TARGETIP_', $_SESSION['config']['server_ip'], $command[1]);
        $command[1] = str_replace('_TARGETFULL_', $alvo['url_clean'], $command[1]);
        $command[1] = str_replace('_TARGETXPL_', $alvo['url_xpl'], $command[1]);
        $command[1] = str_replace("_EXPLOIT_", $_SESSION['config']['exploit-command'], $command[1]);
        $command[1] = str_replace("_URI_", $uri['path'], $command[1]);
        $command[1] = str_replace("_PORT_", $alvo['url_port'], $command[1]);
        $command[1] = str_replace("_RANDOM_", random(5), $command[1]);
        $command[1] = str_replace("\n", '', str_replace("\r", '', $command[1]));

        $command[1] = __crypt($command[1]);

        echo "\n{$cor->whit}[ CMD ]__".PHP_EOL;
        echo "         |[ EXTERNAL COMMAND ]:: {$command[0]}{$cor->mag1}".PHP_EOL;
        $_ = array(0 => ($_SESSION['config']['popup']) ? 'sudo xterm -geometry 134x50+1900+0 -title "Auxiliary Window - INURLBR / COMMAND" -e ' : NULL, 1 => ($_SESSION['config']['popup']) ? ' > /dev/null &' : NULL);
        echo ($_SESSION['config']['popup'] ? "\t[!] opening auxiliary window...\n" : NULL);
        $dados = system($_[0] . $command[1] . $_[1], $dados);
        sleep(1) . __plus();

        echo $cor->end;
    endif;
    if (empty($dados[0])):
        return FALSE;
    endif;
    unset($dados);
}