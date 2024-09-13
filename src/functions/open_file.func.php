<?php

function __openFile($arquivo, $op = NULL) {

    if (isset($arquivo) && !empty($arquivo)):
        $resultadoURL = array_unique(array_filter(explode("\n", file_get_contents($arquivo))));
        $data = array_filter($resultadoURL, "__filterEmptyArray");  
        if (is_array($data)):
            return ($op == 1 ? $data : __process($data));
        endif;
    endif;
}

function __filterEmptyArray($var){
    $var = trim($var);
    return ($var !== NULL && $var !== FALSE && $var !== "" && isset($var) && !empty($var));
}