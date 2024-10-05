<?php

function __check_update(): array{
    $cor = $GLOBALS['COR']; 
    $cmd_status = "git -C {$_SESSION['config']['pwd']}/../../ status | grep 'Your branch is behind'";
    echo "{$cor->whit}[ CMD ] {$cor->red2}{$cmd_status}{$cor->end}", PHP_EOL;
    exec($cmd_status, $output_status, $return_status);
    __plus();
    return [$return_status, $output_status];
}

function __update(): void {
    $cor = $GLOBALS['COR']; 
    echo __bannerLogo();
    __plus();
    echo "{$cor->whit}[ WRN ] {$cor->red2}Want to make update script{$cor->end}", PHP_EOL;
    echo "{$cor->whit}[ WRN ] {$cor->red2}This can modify the current script{$cor->end}", PHP_EOL;
    echo "{$cor->whit}[ WRN ] {$cor->red2}Are you sure ? (y \ n): {$cor->end}";
    __plus();

    if (trim(fgets(STDIN)) == 'y'):
        [$return_status,$output_status] = __check_update();
        if(__not_empty($output_status)):
            echo "{$cor->whit}[ INF ] {$cor->red2}UPDATE...{$cor->end}", PHP_EOL;
            __plus();
            $cmd_pull = "git -C {$_SESSION['config']['pwd']}/../../ pull origin master";
            echo "{$cor->whit}[ CMD ] {$cor->red2}{$cmd_pull}{$cor->end}", PHP_EOL;
            __plus();
            exec($cmd_pull, $output_pull, $return_pull);
            if(__not_empty($return_pull)):
                echo "{$cor->whit}[  +  ] {$cor->red2}OK{$cor->end}", PHP_EOL;
                __plus();
            else:
                __getOut("{$cor->whit}[ ERR ] {$cor->red2}Pull origin master{$cor->end}".PHP_EOL);
            endif;
        else:
            __getOut("{$cor->whit}[ INF ] {$cor->red2}Your branch is updated{$cor->end}".PHP_EOL);
        endif;
    endif;
}