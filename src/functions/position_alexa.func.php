<?php

function __positionAlexa($url): string {

    $xmlSimple = simplexml_load_file("http://data.alexa.com/data?cli=10&dat=snbamz&url={$url}");
    $resultRank = $xmlSimple->SD[1];
    __plus();
    $retornoRank = $resultRank ? $resultRank->REACH->attributes()->RANK : 0;
    return $retornoRank . __plus();
}