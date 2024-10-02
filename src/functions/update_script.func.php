<?php

function __msg_update_error(): void{
    $cor = $GLOBALS['COR']; 
    echo __bannerLogo();
    echo "{$cor->whit}[  x  ] {$cor->red2}Failure to server!{$cor->end}", PHP_EOL;
    __plus();
}

function __check_update(): array{
    $cor = $GLOBALS['COR']; 
    $cmd_status = "git -C {$_SESSION['config']['pwd']}/../../ status | grep 'Your branch is behind'";
    echo "{$cor->whit}[  !  ] {$cor->red2}{$cmd_status}{$cor->end}", PHP_EOL;
    exec($cmd_status, $output_status, $return_status);
    __plus();
    return [$return_status, $output_status];
}

function __update(): void {
    $cor = $GLOBALS['COR']; 
    echo __bannerLogo();
    __plus();
    echo "{$cor->whit}[  !  ] {$cor->red2}Want to make update script{$cor->end}", PHP_EOL;
    echo "{$cor->whit}[  !  ] {$cor->red2}This can modify the current script{$cor->end}", PHP_EOL;
    echo "{$cor->whit}[  !  ] {$cor->red2}Are you sure ? (y \ n): {$cor->end}";
    __plus();

    if (trim(fgets(STDIN)) == 'y'):
        [$return_status,$output_status] = __check_update();
        if(__not_empty($return_status)):
            echo "{$cor->whit}[  !  ] {$cor->red2}UPDATE...{$cor->end}", PHP_EOL;
            print_r($output_status);
            __plus();
            $cmd_pull = "git -C {$_SESSION['config']['pwd']}/../../ pull origin master";
            exec($cmd_pull, $output_pull, $return_pull);
            if(!$return_status):
                echo "{$cor->whit}[  +  ] {$cor->red2}OK{$cor->end}", PHP_EOL;
                print_r($output_pull);
                __plus();
            else:
                __msg_update_error();
                __plus();
            endif;
        else:
            __msg_update_error();
            __plus();
        endif;
    endif;
}