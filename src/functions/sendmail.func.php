<?php

function __sendMail($email, $value) {

    $headers = NULL;
    $headers .= "From: <scanner-inurlbr@localhost>\r".PHP_EOL;
    $headers .= "MIME-Version: 1.0\r".PHP_EOL;
    $headers .= "Content-type: text/html; charset=iso-8859-1\r".PHP_EOL;
    $headers .= "content-type: text/html\nX-priority: 1".PHP_EOL;
    $body = "------------------------------------------------------".PHP_EOL;
    $body.="DATE:  [" . date("d-m-Y H:i:s") . "]";
    $body.=__not_empty($_SESSION['config']['http-header']) ? "HTTP HEADER: {$_SESSION['config']['http-header']}". PHP_EOL: NULL;
    $body.=__not_empty($_SESSION['config']['motor']) ? "MOTOR BUSCA: {$_SESSION['config']['motor']}". PHP_EOL: NULL;
    $body.=__not_empty($_SESSION['config']['tipoerro']) ? "TIPO ERROR: {$_SESSION['config']['tipoerro']}". PHP_EOL: NULL;
    $body.=__not_empty($_SESSION['config']['exploit-get']) ? "EXPLOIT GET: {$_SESSION['config']['exploit-get']}". PHP_EOL: NULL;
    $body.=__not_empty($_SESSION['config']['exploit-post']) ? "EXPLOIT-POST: {$_SESSION['config']['exploit-post']}". PHP_EOL: NULL;
    $body.=__not_empty($_SESSION['config']['command-vul']) ? "COMMAND VUL: {$_SESSION['config']['command-vul']}". PHP_EOL: NULL;
    $body.=__not_empty($_SESSION['config']['command-all']) ? "COMMAND ALL: {$_SESSION['config']['command-all']}". PHP_EOL: NULL;
    $body.=__not_empty($_SESSION['config']['user-agent']) ? "USER AGENT: {$_SESSION['config']['user-agent']}". PHP_EOL: NULL;
    $body.= "------------------------------------------------------".PHP_EOL;

    if (mail($email, "[ INF ][ OUTPUT INURLBR ]:: {$value}", $body, $headers)):
        __plus();
        return "[ INF ][ SUBMITTED SUCCESSFULLY ]".PHP_EOL;
    else:
        __plus();
        return "[ ERR ][ NOT SENT ]".PHP_EOL;
    endif;
}