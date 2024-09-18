<?php

function __installDepencia() {

    echo "\n{$_SESSION["c15"]}|_[ * ]__{$_SESSION["c0"]}\n";
    echo "         {$_SESSION["c15"]}|[EXTERNAL COMMAND INSTALLING PREMISES ]:: {$_SESSION["c11"]}\n";
    $dados = system("sudo apt-get install curl libcurl3 libcurl3-dev php8 php8-cli php8-curl xterm tor", $dados) . __plus();
    sleep(1) . __plus();
    echo "{$_SESSION["c0"]}";
    if (empty($dados)):
        return FALSE;
    endif;
    unset($dados);
    exit();
}