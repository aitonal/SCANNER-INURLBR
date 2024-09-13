<?php

function __getValuesRobots($url) {
    if($url):
        $new_url = "https://" . __filterHostname($url);
        $new_url_robots = "{$new_url}/robots.txt";
        $result = __request_info($new_url_robots, $_SESSION["config"]["proxy"], NULL);
        echo "\n{$_SESSION["c1"]}[  *  ]__\n";
        echo "         |[ ACCESSING FILE ROBOTS ]::\n";
        if (__not_empty($result['corpo']) && $result['server']['http_code'] == 200):
            $robots_file = array_unique(array_filter(explode("\n", $result['corpo'])));
            foreach ($robots_file as $value):
                if (strstr($value, 'Disallow:') || strstr($value, 'Allow:')):
                    $path = trim(explode(':', $value)[1]); 
                    $url_robot_path = $new_url.$path;
                    if (!strstr($path, '*') && $path != '/' && !strstr($path, '$')):
                        $url_list[] = $url_robot_path;
                    endif;
                    echo "         |{$value}\n";
                endif;
                __plus();
            endforeach;
            $url_list = array_filter(array_unique($url_list));
            if (is_array($url_list)):
                echo "{$_SESSION["c1"]}[  *  ]__\n";
                echo "         |[ URL FROM ROBOTS ]::\n";
                foreach ($url_list as $value_robot):
                    echo "         |{$value_robot}\n";
                    __saveValue($_SESSION['config']['arquivo_output'], $value_robot, 2);
                endforeach;
            endif;
        else:
            echo "         |[ ERR ] LOAD FILE ROBOTS.TXT [ COD_HTTP ]:: {$result['server']['http_code']}\n{$_SESSION["c0"]}";
        endif;
    endif;
}