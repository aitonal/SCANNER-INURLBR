<?php
function __process($resultadoURL) {

    __plus();
    $resultadoURL[0] = (is_array($resultadoURL) ? array_unique(array_filter($resultadoURL)) : $resultadoURL);
    $resultadoURL[0] = ($_SESSION['config']['unique'] ? __filterDomainUnique($resultadoURL[0]) : $resultadoURL[0]);

    $resultadoURL[0] = (__not_empty($_SESSION['config']['ifurl']) ? __filterURLif($resultadoURL[0]) : $resultadoURL[0]);
    $_SESSION['config']['total_url'] = count($resultadoURL[0]);

    echo "\n{$_SESSION["c1"]}[ INF ] {$_SESSION["c16"]}[ TOTAL FOUND VALUES ]::{$_SESSION["c1"]} [ {$_SESSION['config']['total_url']} ]{$_SESSION["c0"]}".PHP_EOL;
    __debug(['debug' => $resultadoURL[0], 'function' => __FUNCTION__], 3);

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
            __getOut("{$_SESSION["c1"]}[ INF ] {$_SESSION["c0"]}{$_SESSION["c2"]}ERROR Fork failed{$_SESSION["c0"]}".PHP_EOL);
        endif;

        $_SESSION['config']['user-agent'] = ($_SESSION['config']['shellshock']) ? $_SESSION['config']['user_agent_xpl'] : $_SESSION['config']['user-agent'];
        
        __plus();
        __processUrlExec(url_list: $resultadoURL[0]);
        __plus();
        
    else:
        print_r("{$_SESSION["c1"]}[ INF ] {$_SESSION["c2"]} Not a satisfactory result was found!{$_SESSION["c0"]}\n");
    endif;
}