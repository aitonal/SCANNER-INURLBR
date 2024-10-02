<?php

function __proxyHttpRandom(): mixed {
    $proxy_file = file_exists($_SESSION['config']['proxy-http-file']) ? __openFile($_SESSION['config']['proxy-http-file'], 1) : [];
    $proxy_ = is_array($proxy_file) ? array_merge($_SESSION['config']['proxy-http'], $proxy_file) : $_SESSION['config']['proxy-http'];
    shuffle($proxy_);
    return $proxy_[0];
}