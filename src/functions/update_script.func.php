<?php

function __msg_update_error(){
    echo system("command clear");
    echo "{$_SESSION["c1"]}[  x  ] {$_SESSION["c16"]}FAILURE TO SERVER!\n{$_SESSION["c0"]}";
}

function __check_update(){
    $cmd_status = "git -C {$_SESSION['config']['pwd']}/../../ status | grep 'Your branch is behind'";
    echo "{$_SESSION["c1"]}[  !  ] {$_SESSION["c16"]}{$cmd_status}\n{$_SESSION["c0"]}";
    exec($cmd_status, $output_status, $return_status);
    return [$return_status, $output_status];
}

function __update() {

    echo "{$_SESSION["c1"]}[  !  ] {$_SESSION["c16"]}WANT TO MAKE UPDATE SCRIPT\n{$_SESSION["c0"]}";
    echo "{$_SESSION["c1"]}[  !  ] {$_SESSION["c16"]}This can modify the current script\n{$_SESSION["c0"]}";
    echo "{$_SESSION["c1"]}[  !  ] {$_SESSION["c16"]}ARE YOU SURE ? (y \ n): {$_SESSION["c0"]}";

    if (trim(fgets(STDIN)) == 'y'):
        [$return_status,$output_status] = __check_update();
        if(!$return_status):
            echo "{$_SESSION["c1"]}[  !  ] {$_SESSION["c16"]}UPDATE...\n{$_SESSION["c0"]}";
            print_r($output_status);
            $cmd_pull = "git -C {$_SESSION['config']['pwd']}/../../ pull origin master";
            exec($cmd_pull, $output_pull, $return_pull);
            if(!$return_status):
                echo "{$_SESSION["c1"]}[  +  ] {$_SESSION["c16"]}OK\n{$_SESSION["c0"]}";
                print_r($output_pull);
            else:
                __msg_update_error();
            endif;
        else:
            __msg_update_error();
        endif;
    endif;
}