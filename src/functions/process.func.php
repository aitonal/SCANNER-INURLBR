<?php
function __process($resultadoURL) {

    __plus();
    $cor = $GLOBALS['COR'];
    $resultadoURL[0] = (is_array($resultadoURL) ? array_unique(array_filter($resultadoURL)) : $resultadoURL);
    $resultadoURL[0] = ($_SESSION['config']['unique'] ? __filterDomainUnique($resultadoURL[0]) : $resultadoURL[0]);

    $resultadoURL[0] = (__not_empty($_SESSION['config']['ifurl']) ? __filterURLif($resultadoURL[0]) : $resultadoURL[0]);
    $_SESSION['config']['total_url'] = count($resultadoURL[0]);

    echo "\n{$cor->whit}[ INF ] {$cor->red2}[ TOTAL FOUND VALUES ]::{$cor->whit} [ {$_SESSION['config']['total_url']} ]{$cor->end}".PHP_EOL;
    __debug(['debug' => $resultadoURL[0], 'function' => __FUNCTION__], 3);
    echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}".PHP_EOL;
    
    if (count($resultadoURL[0]) > 0):

        if(__not_empty($_SESSION['config']['irc']['conf'])):
            $_SESSION['config']['irc']['irc_connection'] = __ircConect($_SESSION['config']['irc']);
            $_SESSION['config']['irc']['my_fork'] = pcntl_fork();
        endif;

        if($_SESSION['config']['irc']['my_fork'] == 0):
            if(__not_empty($_SESSION['config']['irc']['irc_connection'])):
                __ircPong($_SESSION['config']['irc']);
                exit(0);
            endif;
        elseif($_SESSION['config']['irc']['my_fork'] == -1):
            __getOut("{$cor->whit}[ INF ] {$cor->end}{$cor->yell}ERROR Fork failed{$cor->end}".PHP_EOL);
        endif;

        $_SESSION['config']['user-agent'] = ($_SESSION['config']['shellshock']) ? $_SESSION['config']['user_agent_xpl'] : $_SESSION['config']['user-agent'];
        
        __plus();
        __processUrlExec(url_list: $resultadoURL[0]);
        __plus();
        
    else:
        print_r("{$cor->whit}[ INF ] {$cor->yell} Not a satisfactory result was found!{$cor->end}\n");
    endif;
}