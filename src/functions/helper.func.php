<?php

#################################################################################
#CHECK IF VARIABLE IS EMPTY######################################################
#################################################################################
function __not_empty($value = null): bool {
    return !is_null($value) && !empty($value) && $value !=="" ? true : false;
}

#################################################################################
#USED ​​TO VALIDATE OPTIONS AND PARAMETERS / MENU##################################
#################################################################################
function __validateOptions($opArray, $validar, $op = null): bool {

    if (empty($validar) || empty($opArray)):
        return false;
    endif;

    $array = explode(',', $opArray);

    if (is_null($op)):
        $busca = explode(',', $validar);
        for ($i = 0; $i <= count($busca); $i++):
            if (in_array($busca[$i], $array))
                return true;
        endfor;
    else:
        for ($i = 0; $i <= count($array); $i++):
            if (__not_empty($array[$i])):
                if (strstr($validar, $array[$i])):
                    return true;
                endif;
            endif;
        endfor;
    endif;
    return false;
}

################################################################################
#FUNCTION USED IN LOOP TO CHECK STRING FOR ERROR IN HTML########################
################################################################################
function __validate_error_db($html_, $verificar, $bd): mixed {
    return (strstr($html_, $verificar)) ? $bd : null;
}

################################################################################
#OUTPUT BUFFERING###############################################################
################################################################################
function __plus(): void {
    ob_flush();
    flush();
    ob_end_flush(); 
    ob_start();
}

#################################################################################
#SECURITIES VALIDATION DOUBLE####################################################
#################################################################################
function __validate_trash($result){
    if (__not_empty($result)):
        $trash_list = $_SESSION['config']['trash_list'];
        $trash_list = explode("\n", $trash_list);
        if(__not_empty($trash_list)):
            $regex = implode("|", $trash_list);
            $data = preg_grep("({$regex})", $result);
            $data = array_diff($result,$data);
            return $data;
        endif;
    endif;
}

#################################################################################
#SECURITIES VALIDATION DOUBLE####################################################
#################################################################################
function __array_filter_unique($array) {
    if (__not_empty($array)):
        return array_filter(array_unique($array));
    endif;
}

################################################################################
#SCHEMA VALIDATION##############################################################
################################################################################
function __add_scheme($value){
    if(__not_empty($value)):
     if(!strstr($value, 'http')):
         $value = "https://{$value}";
         return $value;
     endif;
    endif;
    return $value;
 }


################################################################################
#REMOVE VALUE URL###############################################################
################################################################################
function __remove($value, $url): array|string {
    return str_replace($value, '', $url);
}

################################################################################
#FUNCTION TO USE FIBER##########################################################
################################################################################
# https://www.php.net/manual/pt_BR/language.fibers.php
# https://www.php.net/manual/pt_BR/class.fiber.php
function __fiber_simples($function , $args) {
    $fiber = new Fiber($function(...));
    $fiber->start(...$args);
    return $fiber->getReturn();
}

################################################################################
#FUNCTION USED IN ARRAY_FILTER##################################################
################################################################################
function __filterEmptyArray($var){
    if(__not_empty($var)):
        $var = trim($var);
        return $var !== null && $var !== false && $var !== "" && isset($var) && !empty($var);
    endif;
}

################################################################################
#GENERATE RANDOM STRING#########################################################
################################################################################
#(PHP4,PHP5) Shuffle an array http://php.net/manual/en/function.shuffle.php
function random(int $len) {
    if(__not_empty($len)):
        $len = substr(md5(mt_rand()), 0, $len);
    endif;
    return $len;
}

################################################################################
#This function will validate emails#############################################
################################################################################
function __validateEmail($email): bool {
    if(__not_empty($email)):
        if (filter_var($email, FILTER_VALIDATE_EMAIL)):
            return true;
        endif;
        #if(preg_match('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/', $email)):
        #    return true;
        #endif;
    endif;
    return false;
}

################################################################################
#This function will validate URLS###############################################
################################################################################
function __validateURL($url): bool {
    if(__not_empty($url)):
        if (filter_var($url, FILTER_VALIDATE_URL)):
            return true;
        endif;
        if (preg_match("#\b(http[s]?://|ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#sUi", $url)):
            return true;
        endif;
    endif;
    return false;
}

################################################################################
#This function removes the last regular expression   ###########################
################################################################################
function __filterURLTAG($valor = null) {
    if (__not_empty($valor)):
        $replace = [
            '"', "'", 'href="','src="', 'android-app://',
            'value="', 'whatsapp://send?text=', 'tg://',
            'mailto:', 'android-app://', 'webcal://'
        ];
       return str_replace($replace, '', $valor);
    endif;
    return null;
}

################################################################################
#REMOVE TARGET URL #############################################################
################################################################################
function __replace_url_value($url): array|string{
    # http://click.hotbusca.com/clk.php?url=https://groups.drupal.org/node/477438
    return str_replace('http://click.hotbusca.com/clk.php?url=','',$url);
}

################################################################################
#GET TITLE FROM HTML ###########################################################
################################################################################
function __parse_title($html): string|null {
    $matches = [];
	preg_match_all("/<title.*>(.*)<\/title>/iUs", $html, $matches);
	if (count($matches) > 1):
		$title = trim(str_replace("\n","",$matches[1][0]));
		return $title;
    else:
		return null;
	endif;
}

################################################################################
#IDENTIFY A CMS HTML TAG #######################################################
################################################################################
function __simpleCheckCMS($html): string {
    $cms['XOOPS CMS IDENTIFIED'] = '<meta name="generator" content="XOOPS"';
    $cms['Joomla CMS IDENTIFIED'] = '<meta name="generator" content="Joomla!';
    $cms['Wordpress CMS IDENTIFIED'] = '<meta name="generator" content="WordPress';
    $cms['SMF CMS IDENTIFIED-1'] = '<a href="http://www.simplemachines.org/" title="Simple Machines Forum" target="_blank">Powered by SMF';
    $cms['SMF CMS IDENTIFIED-2'] = '<a href="http://www.simplemachines.org/about/copyright.php" title="Free Forum Software" target="_blank">SMF';
    $cms['vBulletin CMS IDENTIFIED-1'] = '<meta name="generator" content="vBulletin';
    $cms['vBulletin CMS IDENTIFIED-2'] = 'Powered by <a href="http://www.vbulletin.com" id="vbulletinlink">vBulletin&trade;</a> Version';
    $cms['vBulletin CMS IDENTIFIED-3'] = 'powered by vBulletin';
    $cms['phpBB CMS IDENTIFIED'] = 'Powered by <a href="http://www.phpbb.com/">phpBB</a>';
    $cms['MyBB CMS IDENTIFIED'] = 'Powered By <a href="http://www.mybboard.net" target="_blank">MyBB</a>';
    $cms['Drupal CMS IDENTIFIED-1'] = 'name="Generator" content="Drupal';
    $cms['Drupal CMS IDENTIFIED-2'] = 'Drupal.settings';
    $cms['MODx CMS IDENTIFIED'] = '<a href="http://www.modx.com" target="_blank"> Powered by MODx</a>';
    $cms['SilverStripe CMS IDENTIFIED'] = '<meta name="generator" content="SilverStripe - http://silverstripe.org" />';
    $cms['Textpattern CMS IDENTIFIED'] = 'Powered by <a href="http://www.textpattern.com" title="Textpattern">Textpattern</a>';
    $cms['Adapt CMS IDENTIFIED'] = 'Powered by <a href="http://www.adaptcms.com">AdaptCMS';
    $cms['ATutor CMS IDENTIFIED'] = '<a href="/about.php">About ATutor</a>';
    $cms['b2evolution CMS IDENTIFIED'] = '<meta name="generator" content="b2evolution';
    $cms['Moodle CMS IDENTIFIED-1'] = 'Powered by <a href="http://moodle.org" title="Moodle">Moodle</a>';
    $cms['Moodle CMS IDENTIFIED-2 '] = '<meta name="key words" content="moodle, Course Management System " />';
    $cms['Moodle CMS IDENTIFIED-3'] = '://moodle';
    $cms['Moodle CMS IDENTIFIED-4'] = '://www.mood le';
    $cms['ATutor CMS IDENTIFIED'] = '<META NAME="GENERATOR" CONTENT="PHP-Nuke';
    $cms['PostNuke CMS IDENTIFIED'] = '<meta name="generator" content="PostNuke';
    $cms['CloudFlare IDENTIFIED-1'] = '<a href="http://www.cloudflare.com/" target="_blank" style=';
    $cms['CloudFlare IDENTIFIED-2'] = 'DDoS protection by CloudFlare</a>';

    foreach ($cms as $campo => $valor):
        __plus();
        if (strstr($html, $cms[$campo])):
            return " {$campo} ";
        endif;
    endforeach;
    return "UNIDENTIFIED";
}

################################################################################
#IPV4 AND IPV6 EXTRACTION ######################################################
################################################################################
function __extract_ip($ip): mixed{
    if(__not_empty($ip)):
        //ipv4
        preg_match_all('#^(\d{1,3}\.){3}\d{1,3}$#', trim($ip), $ret);
        if($ret[0][0]):
            return $ret[0][0];
        endif;
        //ipv6
        preg_match_all('#^(((?=(?>.*?(::))(?!.+\3)))\3?|([\dA-F]{1,4}(\3|:(?!$)|$)|\2))(?4){5}((?4){2}|((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?7)){3})$#i', trim($ip), $ret);
        if($ret[0][0]):
            return $ret[0][0];
        endif;
    endif;
    return false;
}

################################################################################
#FILTER HOSTNAME ###############################################################
################################################################################
function __filterHostname($url) {
    if(__not_empty($url)):
        $target = null;
        //#\b((((ht|f)tps?://*)|(www|ftp)\.)[a-zA-Z0-9-\.]+)#i - 1.0
        preg_match_all('@^(?:(ht|f)tps?://*)?([^/]+)@i', $url, $target);
        $replace = [
            '/','"', "'", 'href="','src="', 'android-app://',
            'value="', 'whatsapp://send?text=', 'tg://',
            'mailto:', 'android-app://', 'webcal://',
            'ftps:', 'ftp:','src="', 'https:', 'http:'
        ];
       return str_replace($replace, '', $target[0][0]);
    endif;
}

################################################################################
#GET STATUS HTTP URL############################################################
################################################################################
function __getStatusURL($url): bool {
    if (__not_empty($url))
        return false;
    __plus();
    $status = [];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    $result_curl = curl_exec($curl);
    if ($result_curl):
        preg_match_all('(HTTP.*)', $result_curl, $status['http']) . __plus();
        return (!is_null($status['http']) && !empty($status['http'])) ? true : false;
    endif;
    unset($curl);
    return false;
}

################################################################################
#FILTER DOMAINS AND FORMAT WITH HTTP SCHEMA#####################################
################################################################################
function __filterDomainUnique($result) {
    if (__not_empty($result) && is_array($result)):
        foreach ($result as $value):
            if (__not_empty($value)):
                $temp[] = "https://" . __filterHostname($value);
            endif;
        endforeach;
        return __array_filter_unique($temp);
    endif;
    return false;
}

################################################################################
#GENERATOR RANGE IP#############################################################
################################################################################
function __generatorRangeIP($range) {
    if (__not_empty($range)):
        $ip_array = explode(',', $range);
        if (is_array($ip_array)):
            $ip_range = ['start' => ip2long($ip_array[0]), 'end' => ip2long($ip_array[1])];
            while ($ip_range['start'] <= $ip_range['end']):
                $ip_array_target[] = "http://" . long2ip($ip_range[0]);
                $ip_range['start'] ++;
            endwhile;
        else:
            return false;
        endif;
        return $ip_array_target;
    endif;
}

################################################################################
#GENERATOR RANGE IP RANDOM######################################################
################################################################################
function __generatorIPRandom($cont) {
    if(__not_empty($cont)):
        $range = ['start' => 0, 'end' => $cont];
        while ($range['start'] < $range['end']):
            $bloc[0] = rand(0, 255);
            $bloc[1] = rand(0, 255);
            $bloc[2] = rand(0, 255);
            $bloc[3] = rand(0, 255);
            $ip[] = "http://{$bloc[0]}.{$bloc[1]}.{$bloc[2]}.{$bloc[3]}";
            $range['start'] ++;
        endwhile;
        return __array_filter_unique($ip);
    endif;
}

################################################################################
#Base64 string encryption md5 , hexadecimal, hex, base64 & random string########
################################################################################
#GENERATE RANDOM STRING#########################################################
################################################################################
#(PHP4,PHP5) Shuffle an array http://php.net/manual/en/function.shuffle.php
################################################################################
function __crypt($url) {
    if(__not_empty($url)):
        preg_match_all("#(md5|base64|hex|random)(\()(.*?)(\))#", $url, $matches);
        $cont = 0;
        foreach ($matches[0] as $replace):
            if (strstr($replace, 'md5(')):
                $func = 'md5';
            endif;

            if (strstr($replace, 'base64(')):
                $func = 'base64_encode';
            endif;

            if (strstr($replace, 'hex(')):
                $func = 'bin2hex';
            endif;

            if (strstr($replace, 'random(')):
                $func = 'random';
            endif;

            $url = str_replace($replace, $func($matches[3][$cont]), $url);
            $cont ++;
        endforeach;
    endif;
    return $url;
}

################################################################################
#FIBER WAIT FOR FIBERS #########################################################
#https://www.dynamic-mess.com/php/php81-exemple-fiber-et-curl/
#https://aoeex.com/phile/php-fibers-a-practical-example/
################################################################################
function __waitForFibers(array &$fiberList, ?int $completionCount = null) : array{
    $completedFibers = [];
    $completionCount ??= count($fiberList);
    while (count($fiberList) && count($completedFibers) < $completionCount){
        usleep(1000);
        foreach ($fiberList as $idx => $fiber){
            if ($fiber->isSuspended()){
                $fiber->resume();
            } else if ($fiber->isTerminated()){
                $completedFibers[] = $fiber;
                unset($fiberList[$idx]);
            }
        }
    }
    return $completedFibers;
}

################################################################################
#(CSE)-GOOGLE Custom Search Engine ID RANDOM####################################
################################################################################
function __googleGenericRandom() {

    $generic = [
        '000905274576528531678:hvqlnmyn2is',
        '002901626849897788481:cpnctza84gq',
        '003917828085772992913:gmoeray5sa8',
        '005911257635119896548:iiolgmwf2se',
        '006688160405527839966:yhpefuwybre',
        '006748068166572874491:55ez0c3j3ey',
        '007843865286850066037:3ajwn2jlweq',
        '007843865286850066037:b0heuatvay8',
        '009462381166450434430:0aq_5piun68',
        '010479943387663786936:wjwf2xkhfmq',
        '012873187529719969291:yexdhbzntue',
        '012984904789461885316:oy3-mu17hxk',
        '013269018370076798483:wdba3dlnxqm',
        '018033044562278214682:oxcpaqr8gke',
        'partner-pub-1411074771348646:1404326155',
        'partner-pub-7045961825256243:1400200985',
        '009462381166450434430:frzo6adfjso'
    ];
    shuffle($generic);
    return $generic[0];
}

