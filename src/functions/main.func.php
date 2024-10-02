<?php


function __main($dork, $motor, $cod): void {
    $cor = $GLOBALS['COR'];
    $dork_list[0] = strstr($dork, '[DORK]') ? explode('[DORK]', $dork) : [$dork];
    $dork_list[1] = __not_empty($_SESSION['config']['dork-file']) ? __openFile($_SESSION['config']['dork-file'], 1) : $dork_list[0];
    $dork_list[2] = __not_empty($_SESSION['config']['dork-rand']) ? __randomDork($_SESSION['config']['dork-rand']) : [];
    $dork_list[3] = __array_filter_unique(array_merge($dork_list[0], $dork_list[1], $dork_list[2]));

    $file_proxy = __not_empty($_SESSION['config']['proxy-file']) ? __openFile($_SESSION['config']['proxy-file'], 1) : null;
    $list_proxy = is_array($file_proxy) ? $file_proxy : null;

    __bannerLogo();
    __startingBanner();

    for ($i = 0; $i <= count($dork_list[3]); $i++):

        if (!empty($dork_list[3][$i])):

            echo PHP_EOL, "{$cor->whit}[ INF ]{$cor->end}{$cor->red2} [ DORK ]:: {$cor->whit}[ {$dork_list[3][$i]} ]", PHP_EOL;
            
            __engines(urlencode($dork_list[3][$i]), $list_proxy) . __plus();

            ($_SESSION["config"]["pr"]) ? __process(explode("\n", $_SESSION["config"]["totas_urls"])) . __plus() : null;
            ($_SESSION["config"]["pr"]) ? $_SESSION["config"]["totas_urls"] = null : null;

            echo PHP_EOL;
        endif;
    endfor;

    (!$_SESSION["config"]["pr"]) ?
    __process(explode("\n", $_SESSION["config"]["totas_urls"])) . __plus() : null;

    __exitProcess();
}