<?php

function __update() {

    echo __bannerLogo();

    echo "{$_SESSION["c1"]}__[  !  ] {$_SESSION["c16"]}WANT TO MAKE UPDATE SCRIPT\n{$_SESSION["c0"]}";
    echo "{$_SESSION["c1"]}__[  !  ] {$_SESSION["c16"]}This can modify the current script\n{$_SESSION["c0"]}";
    echo "{$_SESSION["c1"]}__[  !  ] {$_SESSION["c16"]}ARE YOU SURE ? (y \ n): {$_SESSION["c0"]}";

    if (trim(fgets(STDIN)) == 'y'):

        $resultado = __request_info("https://raw.githubusercontent.com/MrCl0wnLab/SCANNER-INURLBR/master/inurlbr", $_SESSION["config"]["proxy"], NULL);

        if (__not_empty($resultado['corpo'])):

            unlink('inurlbr');
            $varf = fopen('inurlbr', 'a');
            fwrite($varf, $resultado['corpo']);
            fclose($varf);
            chmod('inurlbr', 0777);
            echo "\nUPDATE DONE WITH SUCCESS!\n";
            sleep(3);
            system("chmod +x inurlbr | ./inurlbr");
            exit();
        else:
            echo system("command clear") . __bannerLogo();
            echo "{$_SESSION["c1"]}__[ x ] {$_SESSION["c16"]}FAILURE TO SERVER!\n{$_SESSION["c0"]}";
        endif;
    endif;
}