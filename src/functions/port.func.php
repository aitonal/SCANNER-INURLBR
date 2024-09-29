<?php

################################################################################
#VALIDATING OPEN DOORS##########################################################
################################################################################
#(PHP 4, PHP 5) fsockopen — Open Internet or Unix domain socket connection
#http://php.net/manual/en/function.fsockopen.php
function __portScan($result): void {
    if($_SESSION['config']['server_ip']):
        $cor = $GLOBALS['COR'];
        $ports = explode(',', $result[1]);
        echo PHP_EOL, "{$cor->whit}[ SCA ]__", PHP_EOL;
        echo "         |[ PROCESS PORT-SCAN ]::", PHP_EOL;
        foreach ($ports as $value):
            $conc = fsockopen($_SESSION['config']['server_ip'], $value, $result[2], $result[3], 30);
            __plus();
            if(__not_empty($conc)):
                echo "{$cor->whit}         |[ {$value}={$cor->gre1}OPEN{$cor->end}";
                (__not_empty($_SESSION['config']['port-write']) ? __portWrite($conc, $_SESSION['config']['port-write']) : null);
                __saveValue($_SESSION['config']['arquivo_output'], "{$value}=OPEN", 2);
                __plus();
                $result[0]['url_port'] = $value;
                (__not_empty($_SESSION['config']['port-cmd']) ? __command($_SESSION['config']['port-cmd'], $result[0]) : null);
                __plus();
            else:
                echo "{$cor->whit}         |[ {$value}={$cor->grey1}CLOSED{$cor->end}", PHP_EOL;
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
function __portWrite($conect, $values): void {
    $values = explode(',', $values);
    $cor = $GLOBALS['COR'];
    foreach ($values as $value):
        echo "{$cor->whit}|_[ INF ]__|[ WRITE SEND={$value}{$cor->end}", PHP_EOL;
        fwrite($conect, "{$value}\r\n") . sleep(3);
        __plus();
    endforeach;
}