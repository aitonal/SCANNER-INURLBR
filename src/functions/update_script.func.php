<?php

function __msg_update_error(){
    echo system("command clear");
    echo "{$cor->whit}[  x  ] {$cor->red2}FAILURE TO SERVER!\n{$cor->end}";
}

function __check_update(){
    $cmd_status = "git -C {$_SESSION['config']['pwd']}/../../ status | grep 'Your branch is behind'";
    echo "{$cor->whit}[  !  ] {$cor->red2}{$cmd_status}\n{$cor->end}";
    exec($cmd_status, $output_status, $return_status);
    return [$return_status, $output_status];
}

function __update() {

    echo "{$cor->whit}[  !  ] {$cor->red2}WANT TO MAKE UPDATE SCRIPT\n{$cor->end}";
    echo "{$cor->whit}[  !  ] {$cor->red2}This can modify the current script\n{$cor->end}";
    echo "{$cor->whit}[  !  ] {$cor->red2}ARE YOU SURE ? (y \ n): {$cor->end}";

    if (trim(fgets(STDIN)) == 'y'):
        [$return_status,$output_status] = __check_update();
        if(!$return_status):
            echo "{$cor->whit}[  !  ] {$cor->red2}UPDATE...\n{$cor->end}";
            print_r($output_status);
            $cmd_pull = "git -C {$_SESSION['config']['pwd']}/../../ pull origin master";
            exec($cmd_pull, $output_pull, $return_pull);
            if(!$return_status):
                echo "{$cor->whit}[  +  ] {$cor->red2}OK\n{$cor->end}";
                print_r($output_pull);
            else:
                __msg_update_error();
            endif;
        else:
            __msg_update_error();
        endif;
    endif;
}