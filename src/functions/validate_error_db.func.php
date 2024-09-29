<?php

function __validate_error_db($html_, $verificar, $bd): mixed {
    return (strstr($html_, $verificar)) ? $bd : null;
}