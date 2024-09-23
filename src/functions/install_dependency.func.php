<?php

function __installDepencia() {
    $cor = $GLOBALS['COR'];
    echo "\n{$cor->blu1}|_[ INF ]__{$cor->end}".PHP_EOL;
    echo "         {$cor->blu1}|[EXTERNAL COMMAND INSTALLING PREMISES ]:: {$cor->mag1}".PHP_EOL;
    $dados = system("sudo apt-get install curl libcurl3 libcurl3-dev php8 php8-cli php8-curl xterm tor", $dados) . __plus();
    sleep(1) . __plus();
    echo "{$cor->end}";
    if (empty($dados)):
        return FALSE;
    endif;
    unset($dados);
    exit();
}