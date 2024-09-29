<?php

################################################################################
#This function will send the contents of the output buffer (if any)#############
################################################################################
function __plus(): void {
    ob_flush();
    flush();
    ob_end_flush(); 
    ob_start();
}
