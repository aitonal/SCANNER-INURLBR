<?php
function __openFile($file, $op = null) {
    if (__not_empty($file)):
        $result_file = array_unique(array_filter(explode("\n", file_get_contents($file))));
        $data = array_filter($result_file, "__filterEmptyArray");  
        if (is_array($data)):
            return $op == 1 ? $data : __process($data);
        endif;
    endif;
}

function __filterEmptyArray($var){
    if(__not_empty($var)):
        $var = trim($var);
        return $var !== null && $var !== false && $var !== "" && isset($var) && !empty($var);
    endif;
}