<?php 
function __engines($dork, $list_proxy) {
    $cor = $GLOBALS['COR'];
    $dork_exec = (__not_empty($dork)) ? $dork : __getOut("DEFINA SUA DORK".PHP_EOL);
    $list_proxy_rand = !is_null($list_proxy) ? $list_proxy[rand(0, count($list_proxy) - 1)] : null;

    $confArray = ["list_proxy_rand" => $list_proxy_rand, "list_proxy_file" => $list_proxy];

    (!is_null($_SESSION["config"]["tor-random"]) && !is_null($_SESSION["config"]["proxy"]) ? __renewTOR() : null);

    echo "{$cor->end}{$cor->whit}[ INF ] {$cor->end}{$cor->red2}[ SEARCHING ]:: {$cor->whit}{{$cor->end} ";

    __plus();

    echo !is_null($list_proxy_rand) ? PHP_EOL."{$cor->whit}[ INF ] {$cor->end}{$cor->red2}[ PROXY FILE RANDOM ]:: {$cor->whit}[ {$list_proxy_rand} ]{$cor->end} " : null ;

    ################################################################################
    # SEARCH ENGINE :::  google
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 1) || __validateOptions($_SESSION["config"]["motor"], "all")):
        $randHost = __dominioGoogleRandom();
        $_SESSION["config"]['google_attempt'][1] = 0;
        $_SESSION["config"]["dork_tmp"] = $dork_exec;
        $_SESSION["config"]["conf_array_tmp"] = $confArray;
        __pageEngine($confArray,  "GOOGLE - {$randHost}", "https://{$randHost}/search?q=[DORK]&num=1500&btnG=Search&pws=1&sclient=gws-wiz", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  bing
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 2) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "BING", "https://www.bing.com/search?q=[DORK]&filt=rf&first=[PAG]&FORM=PERE", $dork_exec, null, 1, 31, 10);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;

    if (__validateOptions($_SESSION["config"]["motor"], 2) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "BING - DEEP 1 ", "https://www.bing.com/search?q=[DORK]shm=cr&form=DEEPSH&shajax=1", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;

    if (__validateOptions($_SESSION["config"]["motor"], 2) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "BING - DEEP 2", "https://www.bing.com/search?q=[DORK]&form=DEEPSH&shm=cr&mgidx=1&shajax=1", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;

    if (__validateOptions($_SESSION["config"]["motor"], 2) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "BING - DEEP 3", "https://www.bing.com/search?q=[DORK]&form=DEEPSH&shm=cr&mgidx=2&shajax=1", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  yahoo
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 3) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "YAHOO BR", "https://search.yahoo.com/search?fr2=piv-web&p=[DORK]&b=[PAG]&pz=7&bct=0&xargs=0&ei=UTF-8", $dork_exec, null, 1, 43, 7);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  us.yhs4.search.yahoo
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 3) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "YAHOO US", "http://us.yhs4.search.yahoo.com/yhs/search?p=[DORK]&fr=goodsearch-yhsif&b=[PAG]", $dork_exec, null, 1, 451, 10);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  ask
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 4) || __validateOptions($_SESSION["config"]["motor"], "all")):
        $dork_exec =  str_replace(["+"," "], '%20', $dork_exec);
        $html = __request_info("https://www.ask.com/web?q={$dork_exec}&ad=Other%20SEO&an=organic&o=0", $_SESSION["config"]["proxy"], FALSE);
        $uid_ask_search = __getIdSearchAsk($html["corpo"]);
        __pageEngine($confArray, "ASK", "https://www.ask.com/web?ueid={$uid_ask_search}&o=0&an=organic&ad=Other+SEO&qo=pagination&page=[PAG]&q=[DORK]", $dork_exec, null, 0, 4, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;    
    ################################################################################
    # SEARCH ENGINE :::  lycos
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 7) || __validateOptions($_SESSION["config"]["motor"], "all")):
        $html = __request_info("https://search.lycos.com", $_SESSION["config"]["proxy"], FALSE);
        $uid_lycos_search = __getIdSearchLycos($html["corpo"]);
        $id_domain = rand(1, 5);
        __pageEngine($confArray, "LYCOS", "https://search.lycos.com/web/?q=[DORK]&keyvol={$uid_lycos_search}&pageInfo=Keywords=[DORK]&pn=[PAG]", $dork_exec, null, 0, 5, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;   
    ################################################################################
    # SEARCH ENGINE :::  web.search.naver.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 13) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "NEVER", "https://search.naver.com/search.naver?f=&fd=2&filetype=0&nso=so:r,a:all,p:all&query=[DORK]&research_url=&sm=tab_nmr&start=[PAG]&where=webkr", $dork_exec, null, 1, 500, 10);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / USA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "EZILION USA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=usa&f=", $dork_exec, null, 0, 215, 15);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / ASIA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "EZILION ASIA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=asia&f=", $dork_exec, null, 0, 215, 15);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / EUROPA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "EZILION EUROPA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=eu&f=", $dork_exec, null, 0, 215, 15);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / INDIA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "EZILION INDIA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=in&f=", $dork_exec, null, 0, 215, 15);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / CANADA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "EZILION CANADA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=can&f=", $dork_exec, null, 0, 215, 15);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  www.sogou.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 21) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "SOGOU", "http://www.sogou.com/web?query=[DORK]&cid=&s_from=result_up&page=[pag]&ie=utf8&dr=1", $dork_exec, null, 1, 20, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  api.duckduckgo.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 22) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "DUCK DUCK GO", "https://api.duckduckgo.com/?q=[DORK]&kl=en-us&t=hk&ia=web", $dork_exec, null, 1, 20, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;

    ################################################################################
    # SEARCH ENGINE ::: Google Generic RANDOM
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 24) 
        || __validateOptions($_SESSION["config"]["motor"], "all")):
        $randHost = __dominioGoogleRandom();
        $randGeneric = __googleGenericRandom();
        __pageEngine($confArray, "GOOGLE_GENERIC_RANDOM - ID: {$randGeneric}", "http://google.com/cse?cx={$randGeneric}&q=[DORK]&num=500&hl=en&as_qdr=all&start=[PAG]&sa=N", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;

    if (__validateOptions($_SESSION["config"]["motor"], 24) 
        || __validateOptions($_SESSION["config"]["motor"], "all")):
        $randHost = __dominioGoogleRandom();
        $randGeneric = __googleGenericRandom();
        __pageEngine($confArray, "GOOGLE_GENERIC_RANDOM - ID: {$randGeneric}", "http://google.com/cse?cx={$randGeneric}&q=[DORK]&num=500&hl=en&as_qdr=all&start=[PAG]&sa=N", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;


    ################################################################################
    # SEARCH ENGINE :::  www.exalead.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 25) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "EXALEAD", "https://www.exalead.com/search/web/results/?q=[DORK]&elements_per_page=10&start_index=[PAG]", $dork_exec, null, 0, 70, 10);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  www.startpage.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 26) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "STARTPAGE", "https://www.startpage.com/sp/search?lui=english&language=english&query=[DORK]&cat=web&page=[PAG]&sc=Mow3extbsGS910", $dork_exec, null, 0, 6, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    ################################################################################
    # SEARCH ENGINE :::  www.qwant.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 27) || __validateOptions($_SESSION["config"]["motor"], "all")):
        __pageEngine($confArray, "QWANT", "https://www.qwant.com/?q=index.php&t=[DORK]", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    
    #===============================================================================
    #===============================================================================
    #===============================================================================
    #======================[ MOTORES DE BUSCA ESPECIAIS  ]==========================
    #===============================================================================
    #===============================================================================
    #===============================================================================
    #===============================================================================
    # SEARCH ENGINE :::  ndj6p3asftxboa7j.tor2web.org / Tor find ===================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e1")):
        __pageEngine($confArray,"TOR FIND", "https://ndj6p3asftxboa7j.tor2web.org/search.php?search_query=[DORK]&page_num=[PAG]&domainchoice=onion", $dork_exec, null, 1, 5, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    #===============================================================================
    # SEARCH ENGINE :::  elephantjmjqepsw.tor2web.org ==============================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e2")):
        __pageEngine($confArray, "ELEPHANT", "https://elephantjmjqepsw.tor2web.orgsearch?q=[DORK]&page=[PAG]", $dork_exec, null, 0, 29, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    #===============================================================================
    # SEARCH ENGINE :::  kbhpodhnfxl3clb4.tor2web.org ==============================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e3")):
        __pageEngine($confArray, "TORSEARCH", "https://kbhpodhnfxl3clb4.tor2web.org/en/search?j=f&page=[PAG]&q=[DORK]&utf8=%E2%9C%93", $dork_exec, null, 0, 10, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;    
    #===============================================================================
    # SEARCH ENGINE :::  xmh57jrzrnw6insl.onion.ws =================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e4")):
        __pageEngine($confArray, "GORCH", "https://xmh57jrzrnw6insl.onion.ws/4a1f6b371c/search.cgi?cmd=Search!&np=[PAG]&q=[DORK]&s=DRP", $dork_exec, null, 0, 10, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;    
    #===============================================================================
    # SEARCH ENGINE :::  search.wikileaks.org ======================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e5")):
        __pageEngine($confArray, "WIKILEAKS", "https://search.wikileaks.org/?page=[PAG]&q=[DORK]&sort=0#results", $dork_exec, null, 1, 60, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    #===============================================================================
    # SEARCH ENGINE :::  ahmia.fi ==================================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e6")):
        __pageEngine($confArray, "AHMIA", "https://ahmia.fi/search/?q=[DORK]", $dork_exec, null, 0, 0, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    #===============================================================================
    # SEARCH ENGINE ::: oth.net ====================================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e7")):
        __pageEngine($confArray, "OTN", "http://oth.net/s/s?q=[DORK]&cl=1&skip=[PAG]", $dork_exec, null, 1, 211, 20);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;
    #===============================================================================
    # SEARCH ENGINE ::: exploits.shodan.io =========================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e8")):
        __pageEngine($confArray, "EXPLOITS SHODAN", "https://exploits.shodan.io/?q=[DORK]&p=[PAG]", $dork_exec, null, 1, 25, 1);
        __process_request_engine(...$_SESSION['config']['url_list_engine']);
    endif;

    __plus();
}

function __process_filter_urls_engines(array $return_request, $motorNome): void{
    if($return_request["corpo"]):
        $tmp_url =  __filterURL($return_request["corpo"], $motorNome);
        $tmp_url = is_array($tmp_url) ? $tmp_url : [$tmp_url];
        __debug(  ['debug' => "[ URLS FROM ENGINE ] ".implode("\n",$tmp_url), 'function' => __FUNCTION__], 6);
        __subProcess($tmp_url);
        __plus();
    endif;
}

function __process_request_engine($url_list, $proxy, $postDados, $motorNome): void{
    if (__not_empty($url_list)):
        $concurrency = count($url_list) / 2; 
        $fiberList = [];
        $url_nodes = is_array($url_list) ? $url_list : [$url_list];
        foreach ($url_nodes as $url):
            if(__not_empty($url)):
                $fiber = new Fiber(callback: __request_info(...));
                $fiber->start($url, $proxy, $postDados);
                $fiberList[] = $fiber;
                if (count(value: $fiberList) >= $concurrency):
                    foreach (__waitForFibers(fiberList: $fiberList, completionCount: 1) as $fiber):
                        __process_filter_urls_engines($fiber->getReturn(),$motorNome);
                        __plus();
                    endforeach;
                endif;
            endif;
        endforeach;
    endif;
}