<?php
function __process($result_url): void {

    __plus();
    $cor = $GLOBALS['COR'];
    $result_url['targets'] = is_array($result_url) ? __array_filter_unique($result_url) : $result_url;
    $result_url['targets'] = $_SESSION['config']['unique'] ? __filterDomainUnique($result_url['targets']) : $result_url['targets'];
    $result_url['targets'] = __not_empty($_SESSION['config']['ifurl']) ? __filterURLif($result_url['targets']) : $result_url['targets'];
    
    $result_url['targets'] = __validate_trash($result_url['targets']);
    $result_url['targets'] = array_map('__add_scheme', $result_url['targets']);
    
    $result_url['targets'] = __array_filter_unique($result_url['targets']);

    $_SESSION['config']['total_url'] = count($result_url['targets']);

    echo PHP_EOL, "{$cor->whit}[ INF ] {$cor->red2}[ TOTAL FOUND VALUES ]::{$cor->whit} [ {$_SESSION['config']['total_url']} ]{$cor->end}", PHP_EOL;
    __debug(['debug' => $result_url['targets'], 'function' => __FUNCTION__], 3);
    echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}", PHP_EOL;
    __plus();
      
    if (count($result_url['targets']) > 0):

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
        __processUrlExec(url_list: $result_url['targets']);
        __plus();
    else:
        echo "{$cor->whit}[ INF ] {$cor->yell} Not a satisfactory result was found!{$cor->end}", PHP_EOL;
    endif;
}