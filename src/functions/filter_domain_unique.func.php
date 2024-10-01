<?php

function __filterDomainUnique($result) {
    if (__not_empty($result) && is_array($result)):
        foreach ($result as $value):
            if (__not_empty($value)):
                $temp[] = "https://" . __filterHostname($value);
            endif;
        endforeach;
        return __array_filter_unique($temp);
    endif;
    return false;
}