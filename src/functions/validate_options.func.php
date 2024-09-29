<?php

function __validateOptions($opArray, $validar, $op = null): bool {

    if (empty($validar) || empty($opArray)):
        return false;
    endif;
   

    $array = explode(',', $opArray);

    if (is_null($op)):
        $busca = explode(',', $validar);
        for ($i = 0; $i <= count($busca); $i++):
            if (in_array($busca[$i], $array))
                return true;
        endfor;
    else:
        for ($i = 0; $i <= count($array); $i++):
            if (__not_empty($array[$i])):
                if (strstr($validar, $array[$i])):
                    return true;
                endif;
            endif;
        endfor;
    endif;

    return false;
}