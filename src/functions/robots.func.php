<?php

function __getValuesRobots($url): void {
    $cor = $GLOBALS['COR'];
    if(__not_empty($url)):
        $new_url = "https://" . __filterHostname($url);
        $new_url_robots = "{$new_url}/robots.txt";
        $result = __request_info($new_url_robots, $_SESSION["config"]["proxy"], null);
        echo PHP_EOL, "{$cor->whit}[ INF ]__", PHP_EOL;
        echo "         |[ ACCESSING FILE ROBOTS ]::", PHP_EOL;
        __plus();
        if (__not_empty($result['corpo']) && $result['server']['http_code'] == 200):
            $robots_file = __array_filter_unique(explode("\n", $result['corpo']));
            foreach ($robots_file as $value):
                if (strstr($value, 'Disallow:') || strstr($value, 'Allow:')):
                    $path = trim(explode(':', $value)[1]); 
                    $url_robot_path = $new_url.$path;
                    if (!strstr($path, '*') && $path != '/' && !strstr($path, '$')):
                        $url_list[] = $url_robot_path;
                    endif;
                    echo "         |{$value}", PHP_EOL;
                    __plus();
                endif;
                __plus();
            endforeach;
            $url_list = __array_filter_unique($url_list);
            if (is_array($url_list)):
                echo "{$cor->whit}[ INF ]__", PHP_EOL;
                echo "         |[ URL FROM ROBOTS ]::", PHP_EOL;
                __plus();
                foreach ($url_list as $value_robot):
                    echo "         |{$value_robot}", PHP_EOL;
                    __saveValue($_SESSION['config']['arquivo_output'], $value_robot, 3);
                endforeach;
                echo PHP_EOL, "{$cor->whit}[ INF ]{$cor->grey} EXTRACTED URLS SAVED IN::{$cor->grey1} {$_SESSION['config']['arquivo_output']}{$cor->end}";
                __plus();
            endif;
        else:
            echo "         |[ ERR ] LOAD FILE ROBOTS.TXT [ COD_HTTP ]:: {$result['server']['http_code']}{$cor->end}", PHP_EOL;
            __plus();
        endif;
    endif;
}