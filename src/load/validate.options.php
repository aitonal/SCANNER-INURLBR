<?php
$cor = $GLOBALS['COR'];
# [+] VERIFYING use Input PHP CLI.
# (PHP 4, PHP 5) defined — Checks whether a given named constant exists
# http://php.net/manual/pt_BR/function.defined.php */
if(!defined('STDIN')):
    __getOut("{$cor->whit}[ ERR ]{$cor->end}{$cor->yell} Please run it through command-line!{$cor->end}".PHP_EOL);
endif;
# [+] VERIFYING LIB php5-curl IS INSTALLED.
# (PHP 4, PHP 5) function_exists — Return true if the given function has been defined.
# http://php.net/manual/en/function.function-exists.php
# [+] Verification - CURL_EXEC
# Execute the given cURL session.This function should be called after initializing a cURL session and all the
# options for the session are set.
# http://php.net/manual/en/function.curl-exec.php
if(!function_exists('curl_exec')):
    __getOut("{$cor->whit}[ ERR ]{$cor->end}{$cor->yell} INSTALLING THE LIBRARY php5-curl ex: php5-curl apt-get install{$cor->end}".PHP_EOL);
endif;
# [+] VERIFYING PHP VERSION.
# https://www.php.net/downloads.php
# https://www.php.net/releases/8.0/en.php
if (version_compare(phpversion(), '8.0.0', '<')):
    __getOut("{$cor->whit}[ ERR ]{$cor->end}{$cor->yell} PHP VERSION IS INCORRECT ex: version <= 8.0.0{$cor->end}".PHP_EOL);
    exit();
endif;


# [+] PRINTING HELP / INFO
(isset($opcoes['h']) || isset($opcoes['help']) || isset($opcoes['ajuda']) ? 
__menu() : null);
(isset($opcoes['info']) ? 
__info() : null);

# [+] PRINTING EXPLOITS LIST.
(isset($opcoes['exploit-list']) ?
__configExploitsList(1)  : null);

# [+] CREATING DEFAULT SETTINGS EXIT RESULTS.
(!is_dir($_SESSION['config']['out_put_paste']) ?
mkdir($_SESSION['config']['out_put_paste'], 0777, true) : null);

# [+] CREATING DEFAULT SETTINGS MANAGEMENT EXPLOITS.
(!file_exists($_SESSION['config']['file_exploit_conf']) ?
touch($_SESSION['config']['file_exploit_conf']) : null);

# [+] Deletes FILE cookie STANDARD.
(file_exists('cookie.txt') ?
unlink('cookie.txt') : null);

# [+] REGISTRATION NEW COMMAND EXPLOIT
(__not_empty($opcoes['exploit-cad']) ?
__configExploitsADD($opcoes['exploit-cad']) : null);

# [+] Dependencies installation
(isset($opcoes['install-dependence']) ?
__installDepencia() : null);

# [+] UPDATE SCRIPT
(isset($opcoes['update']) ? 
__update() : null);

################################################################################
#CAPTURE OPTIONS################################################################
################################################################################
# [+] VALIDATION SEARCH METHODS / (DORK,RANGE-IP)
if (__not_empty($opcoes['o'])) {
    $_SESSION['config']['abrir-arquivo'] = $opcoes['o'];
} else if (!__not_empty($opcoes['o']) &&
        !__not_empty($opcoes['range']) &&
        !__not_empty($opcoes['range-rand']) &&
        !__not_empty($opcoes['dork-rand'])) {

    $_SESSION['config']['dork'] = __not_empty($opcoes['dork']) && is_null($_SESSION['config']['abrir-arquivo']) ? $opcoes['dork'] : null;
    $_SESSION['config']['dork-file'] = __not_empty($opcoes['dork-file']) && is_null($_SESSION['config']['abrir-arquivo']) ? $opcoes['dork-file'] : null;
    (!__not_empty($_SESSION['config']['dork']) && !__not_empty($_SESSION['config']['dork-file']) ? print("{$cor->whit}[ ERR ] {$cor->end}{$cor->yell}DEFINE DORK ex: --dork '.asp?CategoryID=' OR --dork-file 'dorks.txt'{$cor->end}\n") : null);
}

# [+] VALIDATION GENERATE DORKS RANDOM
$_SESSION['config']['dork-rand'] = __not_empty($opcoes['dork-rand']) ?
$opcoes['dork-rand'] : null;

# [+] VALIDATION TARGET FIND PAGE
$_SESSION['config']['target'] = __not_empty($opcoes['target']) &&
!isset($_SESSION['config']['dork']) ?
$opcoes['target'] : null;

# [+] VALIDATION URL EXTRACTION
$_SESSION['config']['extrai-url'] = isset($opcoes['u']) ? true : null;

# [+] VALIDATION EMAIL EXTRACTION
$_SESSION['config']['extrai-email'] = isset($opcoes['m']) ? true : null;

# [+] VALIDATION URL EXTRACTION FROM web.archive.org
$_SESSION['config']['extrai-url-archive'] = isset($opcoes['ua']) ? true : null;

# [+] VALIDATION ID SEARCH ENGINE
$_SESSION['config']['motor'] = __not_empty($opcoes['q']) &&
__validateOptions('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,e1,e2,e3,e4,e5,e6,all', $opcoes['q']) ?
$opcoes['q'] : 1;

# [+] VALIDATION SAVE FILE VULNERABLE
!__not_empty($opcoes['s']) && !__not_empty($opcoes['save-as']) &&
empty($opcoes['sall']) ? __getOut( "{$cor->whit}[ ERR ] {$cor->end}{$cor->yell}DEFINE FILE SAVE OUTPUT ex: -s , --save-as , --sall filevull.txt{$cor->end}".PHP_EOL) : null;

$_SESSION['config']['s'] = __not_empty($opcoes['s']) ?
$opcoes['s'] : null;

$_SESSION['config']['save-as'] = __not_empty($opcoes['save-as']) ?
$opcoes['save-as'] : null;

$_SESSION['config']['arquivo_output'] = __not_empty($_SESSION['config']['s']) ?
$_SESSION['config']['s'] : $opcoes['save-as'];
# output/
# $_SESSION['config']['arquivo_output'] = $_SESSION['config']['out_put_paste'].$_SESSION['config']['arquivo_output'];

# [+] VALIDATION SAVE FILE ALL VALORES
$_SESSION['config']['arquivo_output_all'] = __not_empty($opcoes['sall']) ?
$opcoes['sall'] : null;

# [+] VALIDATION TYPE ERROR
$_SESSION['config']['tipoerro'] = __not_empty($opcoes['t']) && 
__validateOptions('1,2,3,4,5', $opcoes['t']) ? $opcoes['t'] : 1;

# [+] VALIDATION REPLACEMENT VALUES
$_SESSION['config']['replace'] = __not_empty($opcoes['replace']) ?
$opcoes['replace'] : null;

# [+] VALIDATION SET PROXY
$_SESSION['config']['proxy'] = __not_empty($opcoes['proxy']) ?
$opcoes['proxy'] : null;

# [+] VALIDATION SET FILE WITH LIST OF PROXY
$_SESSION['config']['proxy-file'] = __not_empty($opcoes['proxy-file']) ?
$opcoes['proxy-file'] : null;

# [+] VALIDATION SET HTTP->PROXY
$_SESSION['config']['proxy-http'] = __not_empty($opcoes['proxy-http']) ?
$opcoes['proxy-http'] : null;

# [+] VALIDATION SET FILE WITH LIST OF HTTP->PROXY
$_SESSION['config']['proxy-http-file'] = __not_empty($opcoes['proxy-http-file']) ?
$opcoes['proxy-http-file'] : null;

# [+] VALIDATION SET EXPLOIT VIA REQUEST GET
$_SESSION['config']['exploit-get'] = __not_empty($opcoes['exploit-get']) ?
str_replace(' ', '%20', $opcoes['exploit-get']) : null;

# [+] VALIDATION SET EXPLOIT VIA REQUEST POST
$_SESSION['config']['exploit-post'] = __not_empty($opcoes['exploit-post']) ?
__convertUrlQuery($opcoes['exploit-post']) : null;
$_SESSION['config']['exploit-post_str'] = __not_empty($opcoes['exploit-post']) ?
$opcoes['exploit-post'] : null;

# [+] VALIDATION COMMAND SHELL STRING COMPLEMENTARY
$_SESSION['config']['exploit-command'] = __not_empty($opcoes['exploit-command']) ?
$opcoes['exploit-command'] : null;

# [+] VALIDATION MANAGEMENT COMMANDS SHELL TARGET VULN ID
$_SESSION['config']['exploit-vul-id'] = !is_null($opcoes['exploit-vul-id']) ?
$opcoes['exploit-vul-id'] : null;

# [+] VALIDATION MANAGEMENT COMMANDS SHELL ALL TARGET ID
$_SESSION['config']['exploit-all-id'] = __not_empty($opcoes['exploit-all-id']) ?
$opcoes['exploit-all-id'] : null;

# [+] VALIDATION SET COMMANDS SHELL EXECUTE TARGET VULN
$_SESSION['config']['command-vul'] = __not_empty($opcoes['command-vul']) ?
$opcoes['command-vul'] : null;

# [+] VALIDATION SET COMMANDS SHELL EXECUTE ALL TARGET
$_SESSION['config']['command-all'] = __not_empty($opcoes['command-all']) ?
$opcoes['command-all'] : null;

# [+] VALIDATION ADDITIONAL TYPE OF PARAMETER ERROR
$_SESSION['config']['achar'] = __not_empty($opcoes['a']) ? $opcoes['a'] : null;

# [+] VALIDATION DEBUG NIVEL
$_SESSION['config']['debug'] = __not_empty($opcoes['d']) &&
__validateOptions('1,2,3,4,5,6', $opcoes['d']) ? $opcoes['d'] : null;

# [+] VALIDATION INTERNAL
$_SESSION['config']['verifica_info'] = (__validateOptions($opcoes['d'], 6)) ? 1 : null;

# [+] VALIDATION ADDITIONAL PARAMETER PROXY
$_SESSION['config']['tor-random'] = isset($opcoes['tor-random']) &&
!is_null($_SESSION["config"]["proxy"]) ? true : null;

# [+] VALIDATION CHECK VALUES CMS
$_SESSION['config']['cms-check'] = isset($opcoes['cms-check']) ? true : null;

# [+] VALIDATION CHECK LINKS WEBCACHE GOOGLE
$_SESSION['config']['webcache'] = isset($opcoes['gc']) ? true : null;

# [+] VALIDATION REGULAR EXPRESSION
$_SESSION['config']['regexp'] = __not_empty($opcoes['regexp']) ?
$opcoes['regexp'] : null;

# [+] VALIDATION FILTER BY REGULAR EXPRESSION
$_SESSION['config']['regexp-filter'] = __not_empty($opcoes['regexp-filter']) ?
$opcoes['regexp-filter'] : null;

# [+] VALIDATION NO BANNER SCRIPT
$_SESSION['config']['no-banner'] = isset($opcoes['no-banner']) ? true : null;

# [+] VALIDATION SET USER-AGENT REQUEST
$_SESSION['config']['user-agent'] = __not_empty($opcoes['user-agent']) ?
$opcoes['user-agent'] : null;

# [+] VALIDATION SET URL-REFERENCE REQUEST
$_SESSION['config']['url-reference'] = __not_empty($opcoes['url-reference']) ?
$opcoes['url-reference'] : null;

# [+] VALIDATION PAGING THE MAXIMUM SEARCH ENGINE
$_SESSION['config']['max_pag'] = __not_empty($opcoes['mp']) ?
$opcoes['mp'] : null;

# [+] VALIDATION DELAY SET PAGING AND PROCESSES
$_SESSION['config']['delay'] = __not_empty($opcoes['delay']) ?
$opcoes['delay'] : null;

# [+] VALIDATION SET TIME OUT REQUEST
$_SESSION['config']['time-out'] = __not_empty($opcoes['time-out']) ?
$opcoes['time-out'] : null;

# [+] VALIDATION CODE HTTP
$_SESSION['config']['ifcode'] = __not_empty($opcoes['ifcode']) ?
$opcoes['ifcode'] : null;

# [+] VALIDATION STRING URL
$_SESSION['config']['ifurl'] = __not_empty($opcoes['ifurl']) ?
$opcoes['ifurl'] : null;

# [+] VALIDATION SET HTTP HEADER
$_SESSION['config']['http-header'] = __not_empty($opcoes['http-header']) ?
$opcoes['http-header'] : null;

# [+] VALIDATION SET FILE SUB_PROCESS
$_SESSION['config']['sub-file'] = __not_empty($opcoes['sub-file']) ?
__openFile($opcoes['sub-file'], 1) : null;

# [+] VALIDATION SUB_PROCESS TYPE REQUEST POST
$_SESSION['config']['sub-post'] = isset($opcoes['sub-post']) ? true : null;

# [+] VALIDATION SUB_PROCESS TYPE REQUEST GET
$_SESSION['config']['sub-get'] = isset($opcoes['sub-get']) ? true : null;

# [+] VALIDATION SEND VULN EMAIL
$_SESSION['config']['sendmail'] = __not_empty($opcoes['sendmail']) ?
$opcoes['sendmail'] : null;

# [+] VALIDATION SHOW RANK ALEXA
$_SESSION['config']['alexa-rank'] = isset($opcoes['alexa-rank']) ? true : null;

# [+] VALIDATION ACTIVATE BEEP WHEN APPEAR VULNERABLE
$_SESSION['config']['beep'] = isset($opcoes['beep']) ? true : null;

# [+] VALIDATION OF SINGLE DOMAIN FILTER 
$_SESSION['config']['unique'] = isset($opcoes['unique']) ? true : null;

# [+] VALIDATION IRC SERVER/CHANNEL SEND VULN
$_SESSION['config']['irc']['conf'] = __not_empty($opcoes['irc']) &&
strstr($opcoes['irc'], '#') ? 
explode("#", $opcoes['irc']) : null;

# [+] VALIDATION RANGE IP
$_SESSION['config']['range'] = __not_empty($opcoes['range']) &&
strstr($opcoes['range'], ',') ? 
$opcoes['range'] : null;

# [+] VALIDATION QUANTITY RANGE IP RANDOM
$_SESSION['config']['range-rand'] = __not_empty($opcoes['range-rand']) ?
$opcoes['range-rand'] : null;

# [+] VALIDATION REMOVE STRING URL
$_SESSION['config']['remove'] = __not_empty($opcoes['remove']) ?
$opcoes['remove'] : null;

# [+] VALIDATION ACCESS FILE ROBOTS
$_SESSION['config']['robots'] = isset($opcoes['robots']) ? true : null;

# [+] VALIDATION FILTER EMAIL STRING
$_SESSION['config']['ifemail'] = __not_empty($opcoes['ifemail']) ?
$opcoes['ifemail'] : null;

# [+] VALIDATION OPEN WINDOW CONSOLE PROCESS
$_SESSION['config']['popup'] = isset($opcoes['popup']) ? true : null;

# [+] VALIDATION ACTIVATE SHELLSHOCK
$_SESSION['config']['shellshock'] = isset($opcoes['shellshock']) ? true : null;

# [+] VALIDATION METHOD OF BUSTA PROGRESSIVE
$_SESSION['config']['pr'] = isset($opcoes['pr']) ? true : null;

# [+] VALIDATION SET SUB-COMMANDS SHELL EXECUTE ALL TARGET
$_SESSION['config']['sub-cmd-all'] = isset($opcoes['sub-cmd-all']) ? true : null;

# [+] VALIDATION SET SUB-COMMANDS SHELL EXECUTE TARGET VULN
$_SESSION['config']['sub-cmd-vul'] = isset($opcoes['sub-cmd-vul']) ? true : null;

# [+] VALIDATION SET POR VALIDATION
$_SESSION['config']['port-cmd'] = __not_empty($opcoes['port-cmd']) ?
$opcoes['port-cmd'] : null;

# [+] VALIDATION SET SCAN PORT
$_SESSION['config']['port-scan'] = __not_empty($opcoes['port-scan']) ?
$opcoes['port-scan'] : null;

# [+] VALIDATION SET PAYLOAD XPL PORT
$_SESSION['config']['port-write'] = __not_empty($opcoes['port-write']) ?
$opcoes['port-write'] : null;

# [+] VALIDATION SET URL REDIRECT HEADER
$_SESSION['config']['ifredirect'] = __not_empty($opcoes['ifredirect']) ?
$opcoes['ifredirect'] : null;

# [+] VALIDATION SET URL REDIRECT HEADER
$_SESSION['config']['persist'] = __not_empty($opcoes['persist']) ?
$opcoes['persist'] : 4;

# [+] VALIDATION SET FILE COOKIE
$_SESSION['config']['file-cookie'] = __not_empty($opcoes['file-cookie']) ?
$opcoes['file-cookie'] : null;

# [+] VALIDATION SET STRING CONCAT URL SUB-PROCESS
$_SESSION['config']['sub-concat'] = __not_empty($opcoes['sub-concat']) ?
$opcoes['sub-concat'] : null;