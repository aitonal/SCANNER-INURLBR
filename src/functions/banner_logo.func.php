<?php

function __bannerLogo() {

    $banner="


    {$_SESSION["c12"]} ██▓    ███▄    █     █    ██     ██▀███      ██▓       {$_SESSION["c1"]} ▄▄▄▄       ██▀███▒▒  
    {$_SESSION["c12"]}▓██▒    ██ ▀█   █     ██  ▓██▒   ▓██ ▒ ██▒   ▓██▒      {$_SESSION["c1"]} ▓█████▄    ▓██ ▒ ██▒
    {$_SESSION["c12"]}▒██▒   ▓██  ▀█ ██▒   ▓██  ▒██░   ▓██ ░▄█ ▒   ▒██░      {$_SESSION["c1"]} ▒██▒ ▄██   ▓██ ░▄█ ▒
    {$_SESSION["c12"]}░██░   ▓██▒  ▐▌██▒   ▓▓█  ░██░   ▒██▀▀█▄     ▒██░      {$_SESSION["c1"]} ▒██░█▀     ▒██▀▀█▄  
    {$_SESSION["c12"]}░██░   ▒██░   ▓██░   ▒▒█████▓    ░██▓ ▒██▒   ░██████▒  {$_SESSION["c1"]} ░▓█  ▀█▓   ░██▓ ▒██▒
    {$_SESSION["c12"]}░▓     ░ ▒░   ▒ ▒    ░▒▓▒ ▒ ▒    ░ ▒▓ ░▒▓░   ░ ▒░▓  ░  {$_SESSION["c1"]} ░▒▓███▀▒   ░ ▒▓ ░▒▓░
    {$_SESSION["c12"]} ▒ ░   ░ ░░   ░ ▒░   ░░▒░ ░ ░      ░▒ ░ ▒░   ░ ░ ▒  ░  {$_SESSION["c1"]} ▒░▒   ░      ░▒ ░ ▒░
    {$_SESSION["c16"]} ▒ ░      ░   ░ ░     ░░░ ░ ░      ░░   ░      ░ ░     {$_SESSION["c1"]}  ░    ░      ░░   ░ 
    {$_SESSION["c16"]} ░              ░       ░           ░            ░  ░  {$_SESSION["c1"]}  ░            ░     {$_SESSION["c0"]}{$_SESSION["c1"]}{$_SESSION['config']['version_script']}
    {$_SESSION["c0"]}"; 
                                                   
return print(!is_null($_SESSION['config']['no-banner']) ? NULL : system("clear") . $banner."
{$_SESSION["c12"]} Current IPinfo Token::[ {$_SESSION["c0"]}{$_SESSION["c1"]}" . $_SESSION['config']['token_ipinfo'][0] . " {$_SESSION["c12"]}]{$_SESSION["c0"]}
{$_SESSION["c12"]} Current PHP version::[ {$_SESSION["c0"]}{$_SESSION["c1"]}" . phpversion() . " {$_SESSION["c12"]}]{$_SESSION["c0"]}
{$_SESSION["c12"]} Current Script Owner::[ {$_SESSION["c0"]}{$_SESSION["c1"]}" . get_current_user() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c12"]} Current Uname::[ {$_SESSION["c0"]}{$_SESSION["c1"]}" . php_uname() . " {$_SESSION["c12"]}]{$_SESSION["c0"]}
{$_SESSION["c12"]} Current PWD::[ {$_SESSION["c0"]}{$_SESSION["c1"]}" . getcwd() . " {$_SESSION["c12"]}]{$_SESSION["c0"]}
{$_SESSION["c2"]} Help: inurlbr --help{$_SESSION["c0"]}
 --------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}
".PHP_EOL); 
}