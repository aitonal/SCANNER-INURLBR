<?php


function __main($dork, $motor, $cod) {
    $cor = $GLOBALS['COR'];
    $dork_[0] = (strstr($dork, '[DORK]') ? explode('[DORK]', $dork) : array($dork));
    $dork_[1] = (__not_empty($_SESSION['config']['dork-file']) ? __openFile($_SESSION['config']['dork-file'], 1) : $dork_[0]);
    $dork_[2] = (__not_empty($_SESSION['config']['dork-rand']) ? __randomDork($_SESSION['config']['dork-rand']) : array());
    $dork_[3] = array_filter(array_unique(array_merge($dork_[0], $dork_[1], $dork_[2])));

    $file_proxy = (__not_empty($_SESSION['config']['proxy-file']) ? __openFile($_SESSION['config']['proxy-file'], 1) : NULL);
    $list_proxy = (is_array($file_proxy) ? ($file_proxy) : NULL);

    echo __bannerLogo();
    __startingBanner();

    for ($i = 0; $i <= count($dork_[3]); $i++):

        if (!empty($dork_[3][$i])):

            echo "\n{$cor->whit}[ INF ]{$cor->end}{$cor->red2} [ DORK ]:: {$cor->whit}[ {$dork_[3][$i]} ]".PHP_EOL;
            
            __engines(urlencode($dork_[3][$i]), $list_proxy) . __plus();

            ($_SESSION["config"]["pr"]) ? __process(explode("\n", $_SESSION["config"]["totas_urls"])) . __plus() : NULL;
            ($_SESSION["config"]["pr"]) ? $_SESSION["config"]["totas_urls"] = NULL : NULL;

            echo PHP_EOL;
        endif;
    endfor;

    (!$_SESSION["config"]["pr"]) ?
    __process(explode("\n", $_SESSION["config"]["totas_urls"])) . __plus() : NULL;

    __exitProcess();
}