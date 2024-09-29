<?php

################################################################################
#IRC CONFIGURATION##############################################################
################################################################################
if (is_array($_SESSION['config']['irc']['conf'])):
    $range_alph = range("A", "Z");
    $cor = $GLOBALS['COR'];
    $range = [0 => rand(0, 10000), 1 => $range_alph[rand(0, count($range_alph))]];
    $_SESSION['config']['irc']['my_pid'] = 0;
    $_SESSION['config']['irc']['irc_server'] = $_SESSION['config']['irc']['conf'][0];
    $_SESSION['config']['irc']['irc_channel'] = "#{$_SESSION['config']['irc']['conf'][1]}";
    $_SESSION['config']['irc']['irc_port'] = 6667;
    $_SESSION['config']['irc']['localhost'] = "127.0.0.1 localhost";
    $_SESSION['config']['irc']['irc_nick'] = "[BOT]1nurl{$range[0]}[{$range[1]}]";
    $_SESSION['config']['irc']['irc_realname'] = "B0t_1NURLBR";
    $_SESSION['config']['irc']['irc_quiet'] = "Session Ended";
    global $conf;
elseif (!is_array($_SESSION['config']['irc']['conf']) && __not_empty($opcoes['irc'])):
    __getOut("{$cor->whit}[ ERR ]{$cor->end}{$cor->yell}IRC WRONG FORMAT! ex: --irc 'irc.rizon.net#inurlbrasil' {$cor->end}".PHP_EOL);
endif;

################################################################################
#IRC CONECTION##################################################################
################################################################################
function __ircConect($conf){
    if(__not_empty($$conf['irc_connection']) && __not_empty($conf['irc_port'])):
        $u = php_uname();
        $fp = fsockopen($conf['irc_server'], $conf['irc_port'], $conf['errno'], $conf['errstr'], 30);
        if (!$fp):
            echo "Error: {$conf['errstr']}({$conf['errno']})", PHP_EOL;
            return null;
        endif;
        
        if($fp):
            fwrite($fp, "NICK {$conf['irc_nick']}\r\n");
            fwrite($fp, "USER {$conf['irc_nick']} 8 * :{$conf['irc_realname']}\r\n");
            fwrite($fp, "JOIN {$conf['irc_channel']}\r\n");
            fwrite($fp, "PRIVMSG {$conf['irc_channel']} :[ SERVER ] {$u}\r\n");
            return $fp;
        endif;
    endif;
}

################################################################################
#IRC SEND MSG###################################################################
################################################################################
function __ircMsg($conf, $msg): void {
    if(__not_empty($$conf['irc_connection']) && __not_empty($msg)):
        fwrite($conf['irc_connection'], "PRIVMSG {$conf['irc_channel']} :{$msg}\r\n") . sleep(2);
        __plus();
    endif;
}

################################################################################
#IRC PING PONG##################################################################
################################################################################
function __ircPong($conf): void {
    if(__not_empty($$conf['irc_connection'])):
        while (!feof($conf['irc_connection'])):
            $conf['READ_BUFFER'] = fgets($conf['irc_connection']);
            __plus();
            if (preg_match("/^PING(.+)/", $conf['READ_BUFFER'], $conf['ret'])):
                __debug(['debug' => "[ PING-PONG ] {$conf['ret'][1]}", 'function' => __FUNCTION__], 6) . __plus();
                fwrite($conf['READ_BUFFER'], "PONG {$conf['ret'][1]}\r\n");
                ($_SESSION['config']['debug'] == 6) ?
                                fwrite($conf['irc_connection'], "PRIVMSG {$conf['irc_channel']} :[ PING-PONG ]-> {$conf['ret'][1]}->function:__ircPong\r\n") : null;
            endif;
        endwhile;
    endif;
}

################################################################################
#IRC QUIT#######################################################################
################################################################################
function __ircQuit($conf): void {
    if(__not_empty($$conf['irc_connection'])):
        fwrite($conf['irc_connection'], "QUIT {$conf['irc_quiet']}\r\n") . sleep(2);
        __plus();
        fclose($conf['irc_connection']);
    endif;
}

