<?php

function __processUrlExec_Fiber($url_list) {
    $cor = $GLOBALS['COR'];
    foreach ($url_list as $url):
        if (!__not_empty($url))
            return false;

        $url = urldecode(__not_empty($_SESSION['config']['target']) ? $_SESSION['config']['target'] . $url : $url);
        $contUrl = $_SESSION["config"]["contUrl"]++;
        $host = (!is_null($_SESSION['config']['replace'])) ?
        __replace_url_value(urldecode($_SESSION['config']['tipoerro'] == 3 ? __filterHostname($url) : $url)) :
                urldecode($_SESSION['config']['tipoerro'] == 3 ? __filterHostname($url) : $url);

        $target_['url_xpl'] = __remove($_SESSION['config']['remove'], __mountURLExploit(!is_null($_SESSION['config']['url']) ? 
                $_SESSION['config']['url'] . $host : $host));
        
        $target_['url_clean'] = ($_SESSION['config']['tipoerro'] == 4) ? 
                $_SESSION['config']['url'] . $host : urldecode($url);

        __plus();
        $info = __infoServer($target_['url_xpl'], $_SESSION['config']['exploit-post']);
        __plus();


        if ($_SESSION['config']['tipoerro'] != 5 && is_null($_SESSION['config']['extrai-email']) &&
                is_null($_SESSION['config']['extrai-url']) && is_null($_SESSION['config']['regexp-filter'])):

            $ifredirect = strstr($_SESSION['config']['curl_getinfo']['redirect_url'], $_SESSION['config']['ifredirect']) ?
                    "{$cor->gre}{$_SESSION['config']['curl_getinfo']['redirect_url']}" : null;
            $exget = __not_empty($_SESSION['config']['exploit-get']) ? ' _/GET=> ' . $_SESSION['config']['exploit-get'] : null;
            $expost = __not_empty($_SESSION['config']['exploit-post']) ? ' _/POST=> ' . $_SESSION['config']['exploit-post_str'] : null;
            $valid_return = (__not_empty($_SESSION['config']['erroReturn'])) ? true : false;
            $info = $valid_return ? "{$cor->gre}{$info}" : $info;
            $target_ip = $valid_return ? "{$cor->gre}{$_SESSION['config']['info_ip']}" : $_SESSION['config']['info_ip'];
            $title = $valid_return ? "{$cor->gre}{$_SESSION['config']['title']}" : $_SESSION['config']['title'];
            $title = str_replace($title,"\n","");
            $save_ocultar = isset($_SESSION['config']['arquivo_output_all']) ? 3 : 1;
            $anime = $valid_return ? '[ INF ] ' : '[ LOG ] ';
            __plus();

            if(__not_empty($info)):
                echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}", PHP_EOL;
                echo "{$cor->whit}{$anime} [{$cor->yell} {$contUrl} / {$_SESSION['config']['total_url']} {$cor->whit}]{$cor->grey}-[ " . date("H:i:s") . " ]{$cor->whit} {$cor->end}", PHP_EOL;
                __plus();
            endif;
            if(!__not_empty($info)):
                $anime = '[ ERR ] ';
            endif;
            echo "{$cor->whit}{$anime} {$cor->end}{$cor->whit}Target:: {$cor->grey} {$_SESSION['config']['vull_style']}{$target_['url_clean']}{$cor->whit} {$cor->end}", PHP_EOL;
            __plus();
            if(__not_empty($info)):
                if (__not_empty($exget) || __not_empty($expost)):
                    echo "{$cor->whit}{$anime} {$cor->end}{$cor->whit}Exploit:: {$cor->end}{$cor->red1}{$exget}{$expost}{$cor->end}", PHP_EOL;
                endif;
                echo __not_empty($_SESSION['config']['replace']) ? ("{$cor->whit}{$anime} {$cor->end}{$cor->whit}Replace:: {$cor->end}{$cor->red1}{$_SESSION['config']['replace']}{$cor->end}".PHP_EOL) : null;
                echo __not_empty($_SESSION['config']['remove']) ? ("{$cor->whit}{$anime} {$cor->end}{$cor->whit}Remove:: {$cor->end}{$cor->red1}{$_SESSION['config']['remove']}{$cor->end}".PHP_EOL) : null;
                echo isset($_SESSION['config']['cms-check-resultado']) ? ("{$cor->whit}{$anime} {$cor->end}{$cor->whit}CMS check:: {$cor->end}{$cor->red1}{$_SESSION['config']['cms-check-resultado']}{$cor->end}".PHP_EOL) : null;
                __plus();
                if (__not_empty($title)):
                    echo "{$cor->whit}{$anime} {$cor->end}{$cor->whit}Title:: {$cor->end}{$cor->grey}{$title}{$cor->whit}", PHP_EOL;
                endif;
                echo "{$cor->whit}{$anime} {$cor->end}{$cor->whit}Information server:: {$cor->end}{$cor->grey}{$info}{$cor->whit}", PHP_EOL;
                echo "{$cor->whit}{$anime} {$cor->end}{$cor->whit}More details:: {$cor->end}{$cor->grey}{$target_ip}{$cor->whit}", PHP_EOL;
                __plus();
                if ($valid_return):
                    echo "{$cor->whit}{$anime} {$cor->end}{$cor->whit}Found:: {$cor->grey}" . ($valid_return ? "{$cor->gre}{$_SESSION['config']['erroReturn']}" : "Unidentified") . "{$cor->end}";
                endif;
                echo __not_empty($ifredirect) ? "{$cor->whit}{$anime} {$cor->end}{$cor->whit}URL redirect:: {$cor->grey}{$ifredirect}{$cor->end}" : null;
                __plus();
            endif;
            echo __not_empty(value: $_SESSION['config']['error_conection']) ? PHP_EOL."{$cor->whit}{$anime} {$cor->end}{$cor->whit}ERROR CONECTION:: {$cor->yell}{$_SESSION['config']['error_conection']}{$cor->end}" : null;
            __plus();
            
            if($valid_return):
                    __saveValue($_SESSION['config']['arquivo_output'], $target_['url_xpl'], $save_ocultar);
            endif;

            if (__not_empty($_SESSION['config']['arquivo_output_all'])):
                    __saveValue($_SESSION['config']['arquivo_output_all'], $target_['url_xpl'], 1);
            endif;
            

            echo ($_SESSION['config']['sendmail'] ? "\n{$cor->whit}[  +  ] {$cor->end}{$cor->whit}SEND MAIL:: {$cor->grey}" . (($valid_return) ? "{$cor->gre}" : null) . __sendMail($_SESSION['config']['sendmail'], $target_['url_xpl']) . "{$cor->end}" : null);
            __plus();
            
            if ($valid_return):
                __plus();
                (__not_empty($_SESSION['config']['irc']['irc_connection']) ?
                                    __ircMsg($_SESSION['config']['irc'], "{$_SESSION['config']['erroReturn']}::: {$target_['url_xpl']}") : null);
                __plus();
                (__not_empty($_SESSION['config']['command-vul']) ? 
                                    __command($_SESSION['config']['command-vul'], $target_) : null);
                __plus();
                (!is_null($_SESSION['config']['exploit-vul-id'])?
                                    __configExploitsExec($_SESSION['config']['exploit-vul-id'], $target_) : null);
            endif;
            __plus();
            (__not_empty($_SESSION['config']['command-all']) ? 
                                    __command($_SESSION['config']['command-all'], $target_) : null);
            
            __plus();
            (__not_empty($_SESSION['config']['sub-file']) &&
                    is_array($_SESSION['config']['sub-file']) ? 
                                    __subExecExploits($target_['url_xpl'], $_SESSION['config']['sub-file']) : null);
            
            __plus();
            (__not_empty($_SESSION['config']['exploit-all-id']) ? 
                                    __configExploitsExec($_SESSION['config']['exploit-all-id'], $target_) : null);
            

            ($_SESSION['config']['robots'] ? 
                                    __getValuesRobots($host) : null);
            
            __plus();
            (__not_empty($_SESSION['config']['port-scan']) ? 
                                    __portScan([0 => $target_, 1 => $_SESSION['config']['port-scan']]) : null);
            if(__not_empty($info)):
                echo "{$cor->whit}{$_SESSION['config']['line']}{$cor->end}", PHP_EOL;
                __plus();
            endif;
            __timeSec('delay', PHP_EOL);
        endif;
    endforeach;
}


function __processUrlExec($url_list): void{
        if (__not_empty($url_list)):
            $count_urls = count($url_list);
            if ($count_urls>=100):
                $concurrency = 10;
            endif;
            if ($count_urls<=100 && $count_urls>=50):
                $concurrency = 5;
            endif;
            if ($count_urls<=50 && $count_urls>=10):
                $concurrency = 2;
            endif;
            if ($count_urls<=10):
                $concurrency = 1;
            endif;

            $fiberList = [];
            $url_nodes = is_array($url_list) ? $url_list : [$url_list];
            /*
            #FORA DE Fiber
            #__processUrlExec_Fiber($url_nodes);
            #USO INDIVIDUAL DE URL PARA Fiber
            #foreach ($url_nodes as $url):
                #$url = urldecode(__not_empty($_SESSION['config']['target']) ?
                #            $_SESSION['config']['target'] . $url : $url);
                #$url = __filterURLTAG(valor: $url);
                #if(__validateURL(url: $url) || __not_empty($_SESSION['config']['abrir-arquivo'])):
            */
            $fiber = new Fiber(callback: __processUrlExec_Fiber(...));
            $fiber->start($url_nodes);
            $fiberList[] = $fiber;
            if (count(value: $fiberList) >= $concurrency):
                foreach (__waitForFibers(fiberList: $fiberList, completionCount: 1) as $fiber):
                    $fiber->getReturn();
                    __plus();
                endforeach;
            endif;
                #endif;
            #endforeach;
        endif;
    }