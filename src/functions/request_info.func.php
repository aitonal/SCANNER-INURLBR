<?php
function __request_info_simples($url_, $proxy = null, $postDados = null) {

    $url_ = __crypt($url_);
    $parser_url = parse_url($url_);
    $mh = curl_multi_init();
    $curl_array = [];
    $nodes = is_array($url_) ? $url_ : [$url_];
    $cookie_file = "{$_SESSION['config']['pwd']}/../../cookie.txt";

    foreach ($nodes as $i => $url):

        $curl_array[$i] = curl_init($url);
        
        __plus();

        # FORMATANDO POST & EXECUTANDO urlencode EM CADA VALOR DO POST.
        if (__not_empty($postDados) && is_array($postDados)):
            $postDados_format = "";
            foreach ($postDados as $campo => $valor):
                $postDados_format .= "{$campo}=" . urlencode($valor) . '&';
            endforeach;

            $postDados_format = rtrim($postDados_format, '&');
            curl_setopt($curl_array[$i], CURLOPT_POST, count($postDados));
            curl_setopt($curl_array[$i], CURLOPT_POSTFIELDS, __crypt($postDados_format));
        endif;

        curl_setopt($curl_array[$i], CURLOPT_HTTPHEADER, array_merge(__not_empty($_SESSION['config']['http-header']) ?
                                explode(',', __crypt($_SESSION['config']['http-header'])) : [], ["Cookie: disclaimer_accepted=true"]));
        curl_setopt($curl_array[$i], CURLOPT_USERAGENT, (__not_empty($_SESSION['config']['user-agent'])) ?
                        __crypt($_SESSION['config']['user-agent']) : __setUserAgentRandom());
        curl_setopt($curl_array[$i], CURLOPT_REFERER, (__not_empty($_SESSION['config']['url-reference'])) ?
                        __crypt($_SESSION['config']['url-reference']) : __setURLReferenceRandom());

        (!is_null($proxy) ? curl_setopt($curl_array[$i], CURLOPT_PROXY, $proxy) : NULL);
        (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl_array[$i], CURLOPT_HEADER, 1) : NULL;
        (!is_null($_SESSION['config']['verifica_info']) && __validateOptions('3,6', $_SESSION['config']['debug']) ?
                        curl_setopt($curl_array[$i], CURLOPT_VERBOSE, 1) : NULL);

        __plus();
        curl_setopt($curl_array[$i], CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_array[$i], CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_array[$i], CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($curl_array[$i], CURLOPT_RETURNTRANSFER, 1);
        # curl_setopt($curl_array[$i], CURLOPT_FOLLOWLOCATION, 1);

        curl_setopt($curl_array[$i], CURLOPT_CONNECTTIMEOUT, __not_empty($_SESSION['config']['time-out']) ?
                        $_SESSION['config']['time-out'] : 3);

        curl_setopt($curl_array[$i], CURLOPT_TIMEOUT, __not_empty($_SESSION['config']['time-out']) ?
                        $_SESSION['config']['time-out'] : 3);

        curl_setopt($curl_array[$i], CURLOPT_COOKIEFILE, __not_empty($_SESSION['config']['file-cookie']) ?
                        $_SESSION['config']['file-cookie'] : $cookie_file);

        curl_setopt($curl_array[$i], CURLOPT_COOKIEJAR, __not_empty($_SESSION['config']['file-cookie']) ?
                        $_SESSION['config']['file-cookie'] : $cookie_file);

        curl_multi_add_handle($mh, $curl_array[$i]);
    endforeach;
    
    $running = null;
    do {
        usleep(100);
        curl_multi_exec($mh, $running);
    } while ($running > 0);
    $ret =[];
    foreach ($nodes as $i => $url):
        $ret[0] = curl_multi_getcontent($curl_array[$i]);
        $ret[1] = curl_getinfo($curl_array[$i]);
        $ret[2] = curl_error($curl_array[$i]);
    endforeach;
    foreach ($nodes as $i => $url):
        curl_multi_remove_handle($mh, $curl_array[$i]);
    endforeach;

    $status = null;
    preg_match_all('(HTTP.*)', $ret[0], $status['http']);
    preg_match_all('(Server:.*)', $ret[0], $status['server']);
    preg_match_all('(X-Powered-By:.*)', $ret[0], $status['X-Powered-By']);
   
    __plus();
    $ret[3] = str_replace("\r", '', str_replace("\n", '', "{$status['http'][0][0]}, {$status['server'][0][0]}  {$status['X-Powered-By'][0][0]}"));
    __debug(['debug' => "[ BODY ] {$ret[0]}", 'function' => __FUNCTION__], 4);

    __plus();
    __debug(['debug' => "[ URL ] {$url_}", 'function' => __FUNCTION__], 2);

    __plus();
    curl_multi_close($mh) . unlink($cookie_file);

    __plus();
    unset($curl_array);
    return isset($ret[0]) ? ['corpo' => $ret[0], 'server' => $ret[1], 'error' => $ret[2], 'info' => $ret[3],'parser_url'=>$parser_url] : false;
}

function __get_info_curlcontent(string $return_http): string|null{
    if(__not_empty($return_http)):
        $status = null;
        preg_match_all('(HTTP.*)', $return_http, $status['http']);
        preg_match_all('(Server:.*)', $return_http, $status['server']);
        preg_match_all('(X-Powered-By:.*)', $return_http, $status['X-Powered-By']);
        $info_str = str_replace("\r", '', str_replace("\n", '', "{$status['http'][0][0]}, {$status['server'][0][0]}  {$status['X-Powered-By'][0][0]}"));
        return $info_str ?? null;
    endif;
    return null;
}

function __create_post($postDados): string{
    $postDados_format = "";
    foreach ($postDados as $campo => $valor):
        $postDados_format .= "{$campo}=" . urlencode($valor) . '&';
    endforeach;
    $postDados_format = rtrim($postDados_format, '&');
    return $postDados_format;
}

function __request_Fiber($target, $proxy = null, $postDados = null): array{

    $curl_array = [];
    $is_running = null;
    $return_http = [];
    $curl_mult = curl_multi_init();

    $url_array = is_array($target) ? $target : [$target];
    $cookie_file = "{$_SESSION['config']['pwd']}/../../cookie.txt";
    $header_local = ["Cookie: disclaimer_accepted=true","Cache-Control: max-age=0"];

    foreach ($url_array as $id => $url):
        
        $url = trim(str_replace("\n","",$url));
        $url = __crypt($url);
        $curl_array[$id] = curl_init($url);

        # FORMATANDO POST & EXECUTANDO urlencode EM CADA VALOR DO POST.
        if (__not_empty($postDados) && is_array($postDados)):
            $postDados_format = __create_post($postDados);
            curl_setopt($curl_array[$id], CURLOPT_POST, count($postDados));
            curl_setopt($curl_array[$id], CURLOPT_POSTFIELDS, __crypt($postDados_format));
        endif;

        # SET VALORES HEADER
        $http_header = array_merge(__not_empty($_SESSION['config']['http-header']) ?
        explode(',', __crypt($_SESSION['config']['http-header'])) : [], $header_local);
        curl_setopt($curl_array[$id], CURLOPT_HTTPHEADER, $http_header);

        # SET USER-AGENT
        $user_agent = $_SESSION['config']['user-agent'] ?? __setUserAgentRandom();
        curl_setopt($curl_array[$id], CURLOPT_USERAGENT, $user_agent);

        # SET URL REFERENCE
        $url_refer = $_SESSION['config']['url-reference'] ?? __setURLReferenceRandom();
        curl_setopt($curl_array[$id], CURLOPT_REFERER, $url_refer);

        # SET PROXY
        if(__not_empty($proxy)):
            curl_setopt($curl_array[$id], CURLOPT_PROXY, $proxy);
        endif;

        # SET OUTPUT HEADER
        if(__not_empty($_SESSION['config']['verifica_info'])):
            curl_setopt($curl_array[$id], CURLOPT_HEADER, 1);
            if(__validateOptions('3,6', $_SESSION['config']['debug'])):
                curl_setopt($curl_array[$id], CURLOPT_VERBOSE, 1);
            endif;
        endif;

       
        $time_out = $_SESSION['config']['time-out'] ?? 3;
        curl_setopt($curl_array[$id], CURLOPT_CONNECTTIMEOUT, $time_out);
        curl_setopt($curl_array[$id], CURLOPT_TIMEOUT, $time_out);

        $$cookie_file = $_SESSION['config']['file-cookie'] ?? $cookie_file;
        curl_setopt($curl_array[$id], CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($curl_array[$id], CURLOPT_COOKIEJAR, $cookie_file);

        curl_setopt($curl_array[$id], CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_array[$id], CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_array[$id], CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($curl_array[$id], CURLOPT_RETURNTRANSFER, 1);
        # curl_setopt($curl_array[$i], CURLOPT_FOLLOWLOCATION, 1);

        curl_multi_add_handle($curl_mult, $curl_array[$id]);

    endforeach;

    do {
        usleep(1000);
        curl_multi_exec($curl_mult, $is_running);
        Fiber::suspend();
    } while ($is_running > 0);
    
    foreach ($url_array as $id => $url):
        $curl_content = curl_multi_getcontent($curl_array[$id]);
        $return_http =  [ 
                $curl_content,
                curl_getinfo($curl_array[$id]),
                curl_error(handle: $curl_array[$id]),
                __get_info_curlcontent($curl_content),
                parse_url($url)
        ];
        __debug(['debug' => "[ BODY ] {$curl_content}", 'function' => __FUNCTION__], 4);
        __debug(['debug' => "[ URL ] {$url}", 'function' => __FUNCTION__], 2);
    endforeach;

    foreach ($url_array as $id => $url):
        curl_multi_remove_handle($curl_mult, $curl_array[$id]);
    endforeach;

    curl_multi_close($curl_mult);
    unlink($cookie_file);
    unset($curl_array);
    __plus();
    
    return  $return_http;
}


function __request_info($target, $proxy = null, $postDados = null){
    if (__not_empty($target)):
        $concurrency = $_SESSION['config']['concorracy'] ?? 1;
        $fiberList = [];
        $url_nodes = is_array($target) ? $target : [$target];
        # print_r($url_nodes);
        #foreach ($url_nodes as $url):
        #    if (__not_empty($url)):
                $fiber_request_info = new Fiber(__request_Fiber(...));
                $fiber_request_info->start($url_nodes, $proxy, $postDados);
                $fiberList[] = $fiber_request_info;
                if (count($fiberList) >= $concurrency):
                    foreach (__waitForFibers(fiberList: $fiberList, completionCount: 1) as $fiber_request_info):
                        [ $curl_content, $curl_getinfo, $curl_error, $curl_content_info, $parser_url ] = $fiber_request_info->getReturn();
                        __plus();
                        $_SESSION['config']['error_conection'] = $curl_error;
                        return  [
                            'corpo' => $curl_content, 
                            'server' => $curl_getinfo, 
                            'error' => $curl_error, 
                            'info' => $curl_content_info,
                            'parser_url' => $parser_url
                        ];
                    endforeach;
                endif;
            #endif;
        #endforeach;
    endif;
}