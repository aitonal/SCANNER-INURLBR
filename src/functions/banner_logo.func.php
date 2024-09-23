<?php

function __bannerLogo() {
    $cor = $GLOBALS['COR'];
    $banner="


    {$cor->red} ██▓    ███▄    █     █    ██     ██▀███      ██▓       {$cor->whit} ▄▄▄▄       ██▀███▒▒  
    {$cor->red}▓██▒    ██ ▀█   █     ██  ▓██▒   ▓██ ▒ ██▒   ▓██▒      {$cor->whit} ▓█████▄    ▓██ ▒ ██▒
    {$cor->red}▒██▒   ▓██  ▀█ ██▒   ▓██  ▒██░   ▓██ ░▄█ ▒   ▒██░      {$cor->whit} ▒██▒ ▄██   ▓██ ░▄█ ▒
    {$cor->red}░██░   ▓██▒  ▐▌██▒   ▓▓█  ░██░   ▒██▀▀█▄     ▒██░      {$cor->whit} ▒██░█▀     ▒██▀▀█▄  
    {$cor->red}░██░   ▒██░   ▓██░   ▒▒█████▓    ░██▓ ▒██▒   ░██████▒  {$cor->whit} ░▓█  ▀█▓   ░██▓ ▒██▒
    {$cor->red}░▓     ░ ▒░   ▒ ▒    ░▒▓▒ ▒ ▒    ░ ▒▓ ░▒▓░   ░ ▒░▓  ░  {$cor->whit} ░▒▓███▀▒   ░ ▒▓ ░▒▓░
    {$cor->red} ▒ ░   ░ ░░   ░ ▒░   ░░▒░ ░ ░      ░▒ ░ ▒░   ░ ░ ▒  ░  {$cor->whit} ▒░▒   ░      ░▒ ░ ▒░
    {$cor->red2} ▒ ░      ░   ░ ░     ░░░ ░ ░      ░░   ░      ░ ░     {$cor->whit}  ░    ░      ░░   ░ 
    {$cor->red2} ░              ░       ░           ░            ░  ░  {$cor->whit}  ░            ░     {$cor->end}{$cor->whit}{$_SESSION['config']['version_script']}
    {$cor->end}"; 
                                                   
return !is_null($_SESSION['config']['no-banner']) ? NULL : system("clear") . $banner."
{$cor->red} Current IPinfo Token::[ {$cor->end}{$cor->whit}" . $_SESSION['config']['token_ipinfo'][0] . " {$cor->red}]{$cor->end}
{$cor->red} Current PHP version::[ {$cor->end}{$cor->whit}" . phpversion() . " {$cor->red}]{$cor->end}
{$cor->red} Current Script Owner::[ {$cor->end}{$cor->whit}" . get_current_user() . " {$cor->red2}]{$cor->end}
{$cor->red} Current Uname::[ {$cor->end}{$cor->whit}" . php_uname() . " {$cor->red}]{$cor->end}
{$cor->red} Current PWD::[ {$cor->end}{$cor->whit}" . getcwd() . " {$cor->red}]{$cor->end}
{$cor->yell} Help: inurlbr --help{$cor->end}
 --------------------------------------------------------------------------------------------------------------{$cor->end}
".PHP_EOL; 
}