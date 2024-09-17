<?php

function __validateOptions($opArray, $validar, $op = NULL) {

    if (empty($validar) || empty($opArray)):
        return FALSE;
    endif;
   

    $array = explode(',', $opArray);

    if (is_null($op)):
        $busca = explode(',', $validar);
        for ($i = 0; $i <= count($busca); $i++):
            if (in_array($busca[$i], $array))
                return TRUE;
        endfor;
    else:
        for ($i = 0; $i <= count($array); $i++):
            if (__not_empty($array[$i])):
                if (strstr($validar, $array[$i])):
                    return TRUE;
                endif;
            endif;
        endfor;
    endif;
   
    
    return FALSE;
}