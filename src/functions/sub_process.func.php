<?php

function __subProcess($resultado = null): void {

    $result_array = is_array($resultado) ? __array_filter_unique($resultado) : $resultado;
    if (isset($result_array)):
        foreach ($result_array as $value):
            $value = __filterURLTAG($value);
            $url_validate = __validateURL($value) ? $value : null;
            $url_validate = __replace_url_value($url_validate);
            $trash_list = (!is_null($_SESSION["config"]["webcache"])) ? 
            str_replace('webcache.,', '', $_SESSION['config']['trash_list']) : 
            $_SESSION['config']['trash_list'];
            __plus();
            if (__not_empty($url_validate) && !__validateOptions($trash_list, $url_validate, 1)):
                $_SESSION["config"]["totas_urls"].= $url_validate.PHP_EOL;
            endif;
        endforeach;
    endif;
}

