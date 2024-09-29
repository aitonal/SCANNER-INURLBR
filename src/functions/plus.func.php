<?php

################################################################################
#This function will send the contents of the output buffer (if any)#############
################################################################################
function __plus(): void {
    flush();
    ob_flush();
}
