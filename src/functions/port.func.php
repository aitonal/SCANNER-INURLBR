<?php

################################################################################
#VALIDATING OPEN DOORS##########################################################
################################################################################
#(PHP 4, PHP 5) fsockopen — Open Internet or Unix domain socket connection
#http://php.net/manual/en/function.fsockopen.php

function __portScan($_) {
    if($_SESSION['config']['server_ip']):
        $cor = $GLOBALS['COR'];
        $ports = explode(',', $_[1]);
        echo "\n{$cor->whit}[ SCA ]__".PHP_EOL;
        echo "         |[ PROCESS PORT-SCAN ]::".PHP_EOL;
        foreach ($ports as $value):

            $conc = fsockopen($_SESSION['config']['server_ip'], $value, $_[2], $_[3], 30);

            __plus();

            if ($conc):

                echo "{$cor->whit}         |[ {$value}=\033[1m\{$cor->gre}OPEN{$cor->end}";
                (__not_empty($_SESSION['config']['port-write']) ? __portWrite($conc, $_SESSION['config']['port-write']) : NULL);
                __saveValue($_SESSION['config']['arquivo_output'], "{$value}=OPEN", 2);

                __plus();
                $_[0]['url_port'] = $value;
                (__not_empty($_SESSION['config']['port-cmd']) ? __command($_SESSION['config']['port-cmd'], $_[0]) : NULL);
                __plus();
            else:

                echo "{$cor->whit}         |[ {$value}={$cor->grey1}CLOSED{$cor->end}".PHP_EOL;
                __plus();
            endif;
        endforeach;
        echo $cor->end;
        fclose($conc);
    endif;
}

################################################################################
#WRITING ON THE DOOR############################################################
################################################################################
#(PHP 4, PHP 5) fwrite — Binary-safe file write
#http://php.net/manual/pt_BR/function.fwrite.php
function __portWrite($conect, $valores) {

    $valores = explode(',', $valores);
    $cor = $GLOBALS['COR'];
    foreach ($valores as $value):

        echo "{$cor->whit}|_[ INF ]__|[ WRITE SEND={$value}{$cor->end}".PHP_EOL;
        fwrite($conect, "{$value}\r\n") . sleep(3);
        __plus();
    endforeach;
}