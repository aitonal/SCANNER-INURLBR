<?php

function __setURLReferenceRandom(): string {

    $dominio = [
        'adzuna', 'bixee', 'careerbuilder', 'craigslist', 'dice', 'eluta.ca', 'hotjobs',
        'jobstreet', 'incruit', 'indeed', 'glassdoor', 'linkup', 'monster', 'naukri',
        'yahoo', 'legal', 'googlescholar', 'lexis', 'manupatra', 'quicklaw', 'westlaw',
        'medical', 'bing health', 'bioinformatic', 'citeab', 'eb-eye', 'entrez', 'mtv',
        'ubuntu','genieknows', 'gopubmed', 'healia', 'healthline', 'nextbio', 'pubgene', 
        'quertle', 'searchmedica', 'webmd', 'news', 'bingnews', 'daylife', 'googlenews', 
        'aol', 'microsoft','magportal', 'newslookup', 'nexis', 'topix', 'trapit', 'yahoonews',
        'people', 'comfibook', 'ex.plode', 'infospace', 'peekyou', 'spock', 'spokeo',
        'worldwidehelpers', 'iphone','zabasearch', 'zoominfo', 'fizber', 'hotpads', 'realtor',
        'redfin', 'rightmove', 'trulia', 'zillow', 'zoopla', 'sturents', 'globo', 'sbt', 'band', 
        'cnn'
    ];

    $gTLD = [
        'aero', 'arpa', 'biz', 'com', 'coop', 'edu', 'gov', 'info', 'int', 'mil', 'museum', 'name', 'net', 'org', 
        'pro', 'tel','ba','dabur','kaufen','ua','in','com','net','2000.hu','FedEx','Sony','aaa','aaa.pro','aarp',
        'abarth','abb','abbott','abbvie','abc','abc.br','abkhazia.su','able','abo.pa','abogado','abr.it',
        'abruzzo.it','abudhabi','ac','ac.ae','ac.bd','ac.bw','ac.ci','ac.cn','ac.cy','ac.im','ac.ke','ac.ma',
        'ac.mu','ac.mw','ac.ni','ac.nz','ac.rw','ac.th','ac.tj','ac.tz','ac.ug','ac.uk','ac.vn','aca.pro',
        'academy','accenture','accountant','accountants','acct.pro','aco','active','actor','ad','adac',
        'adm.br','ads','adult','adult.ht','adv.br','adygeya.ru','adygeya.su','ae','ae.com','ae.org',
        'ae.si','aeg','aero','aero.np','aero.tj','aeroport.fr','aetna','af','afamilycompany','afl',
        'africa','africa.com','ag','ag.it','agakhan','agency','agr.br','agrar.hu','agrigento.it',
        'agrinet.tn','agro.pl','ah.cn','ai','aid.pl','aig','aigo','airbus','airforce','airport.aero',
        'airtel','akdn','akita.jp','aktyubinsk.su','al','al.it','alessandria.it','alfaromeo','alibaba',
        'alipay','allfinanz','allstate','ally','alsace','alstom','alt.na','alto-adige.it','altoadige.it',
        'am','am.br','amazon','americanexpress','americanfamily','amex','amfam','amica','amsterdam','an',
        'an.it','analytics','ancona.it','andria-barletta-trani.it','andria-trani-barletta.it','andriabarlettatrani.it',
        'andriatranibarletta.it','android','anquan','anz','ao','ao.it','aol','aosta.it','aoste.it','ap.it','aparecida.br',
        'apartments','app','apple','aq','aq.it','aquarelle','aquila.it','ar','ar.com','ar.it',
        'arab','aramco','arc.pro','archi','arezzo.it','arkhangelsk.su','armenia.su','army','arpa',
        'arq.br','art','art.br','art.do','art.ht','art.sn','arte','arts.nf','arts.ro','as',
        'ascoli-piceno.it','ascolipiceno.it','asda','ashgabad.su','asia','asia.np','asn.au','asn.lv','asso.fr',
        'asso.ht','asso.mc','asso.nc','asso.pf','associates','asti.it','at','at.it','at.pr','at.si','athleta',
        'atm.pl','ato.br','attorney','au','auction','audi','audible','audio','augustow.pl','auspost','author',
        'auto','auto.pl','autos','auz.biz','auz.info','auz.net','av.it','av.tr','avellino.it','avianca',
        'avocat.fr','avocat.pro','aw','aws','ax','axa','az','azerbaijan.su','azure','ba','ba.it',
        'babia-gora.pl','baby','baidu','balashov.su','balsan.it','banamex','bananarepublic','band',
        'bank','bar','bar.pro','barcelona','barclaycard','barclays','barefoot','bargains','bari.it',
        'barking-dagenham.sch.uk','barletta-trani-andria.it','barlettatraniandria.it','barnet.sch.uk',
        'barnsley.sch.uk','bas.it','baseball','bashkiria.ru','bashkiria.su','basilicata.it','basketball',
        'bathnes.sch.uk','bauhaus','bayern','bb','bbc','bbs.tr','bbt','bbva','bcg','bcn','bd','be','beats',
        'beauty','beds.sch.uk','bedzin.pl','beer','belem.br','belluno.it','benevento.it','bentley','bergamo.it',
        'berlin','beskidy.pl','best','bestbuy','bet','bexley.sch.uk','bf','bg','bg.it','bh','bham.sch.uk',
        'bharti','bhz.br','bi','bi.it','bialowieza.pl','bialystok.pl','bible','bid','bielawa.pl','biella.it',
        'bieszczady.pl','bike','bing','bingo','bio','bio.br','bir.ru','biz','biz.az','biz.ck','biz.cy',
        'biz.dk','biz.et','biz.fj','biz.id','biz.ki','biz.mm','biz.ni','biz.np','biz.nr','biz.om','biz.pk',
        'biz.pl','biz.pr','biz.ss','biz.tj','biz.tr','biz.tt','biz.ua','biz.uz','biz.vn','bj','bj.cn','bl',
        'bl.it','black','blackburn.sch.uk','blackfriday','blackpool.sch.uk','blanco','blockbuster','blog',
        'clinic','clinique','clothing','cloud','club','club.tw','clubmed','cm','cn','cn.com','cn.it','cn.si','cn.ua',
        'cng.br','cnt.br','co','co.ae','co.ag','co.am','co.ao','co.at','co.az','co.ba','co.bb','co.bi','co.bw',
        'co.bz','co.ci','co.ck','co.cm','co.com','co.cr','co.cz','co.de','co.dk','co.dm','co.ee','co.fk','co.gg',
        'co.gl','co.gy','co.hu','co.id','co.il','co.im','co.in','co.ir','co.it','co.je','co.jp','co.ke','co.kr',
        'co.lc','co.ls','co.ma','co.mg','co.ms','co.mu','co.mw','co.mz','co.na','co.net.nz','co.ni','co.nl',
        'co.no','co.nu','co.nz','co.om','co.pn','co.pt','co.ro','co.rs','co.rw','co.si','co.sz','co.th','co.tj',
        'co.tt','co.tz','co.ua','co.ug','co.uk','co.uz','co.ve','co.vi','co.za','co.zm','co.zw','coach','codes',
        'coffee','college','cologne','com','com.af','com.ag','com.ai','com.al','com.am','com.ar','com.au','com.az',
        'com.bb','com.bd','com.bh','com.bi','com.bj','com.bm','com.bn','com.bo','com.br','com.bs','com.bt','com.by',
        'com.bz','com.cd','com.ci','com.cm','com.cn','com.co','com.cu','com.cv','com.cw','com.cy','com.de','com.dm',
        'com.do','com.dz','com.ec','com.ee','com.eg','com.es','com.et','com.fj','com.fr','com.ge','com.gh','com.gi',
        'com.gl','com.gn','com.gp','com.gr','com.gt','com.gu','com.gy','com.hk','com.hn','com.hr','com.ht','com.im',
        'com.iq','com.jm','com.jo','com.kg','com.kh','com.ki','com.km','com.kn','com.kw','com.ky','com.kz','com.lb',
        'com.lc','com.lk','com.lr','com.lv','com.ly','com.mg','com.mk','com.mm','com.mo','com.ms','com.mt','com.mu',
        'com.mv','com.mw','com.mx','com.my','com.na','com.ne','com.nf','com.ng','com.ni','com.nl','com.np','com.nr',
        'com.om','com.pa','com.pe','com.pf','com.pg','com.ph','com.pk','com.pl','com.pr','com.ps','com.pt','com.py',
        'com.qa','com.re','com.ro','com.ru','com.sa','com.sb','com.sc','com.sd','com.se','com.sg','com.sl','com.sn',
        'com.so','com.ss','com.sv','com.sy','com.tc','com.td','com.tj','com.tl','com.tn','com.tr','com.tt','com.tw',
        'com.ua','com.ug','com.uy','com.uz','com.vc','com.ve','com.vi','com.vn','com.vu','com.ws','com.ye','com.zm',
        'equipment','er','ericsson','erni','erotica.hu','erotika.hu','es','esp.br','esq','estate','esurance',
        'et','etc.br','eti.br','etisalat','eu','eu.com','eu.pr','eun.eg','eurovision','eus','events','everbank'
    ];

    $arquivo = [
        'admin', 'index', 'wp-admin', 'info', 'shop', 'file', 'out', 'open', 
        'news', 'add', 'profile', 'search', 'open', 'photo', 'insert', 'view'
    ];

    $ext = [
        'exe', 'php', 'asp', 'aspx', 'jsf', 
        'html', 'htm', 'lua', 'log', 'cgi', 
        'sh', 'css', 'py', 'sql', 'xml', 'rss'
    ];

    $pasta = [
        'App_Files', 'Assets', 'CFFileServlet', 'CFIDE', 'Communication', 
        'Computers', 'CoreAdminHome', 'CoreHome', 'Crawler', 'Creator',
        'DECOM', 'Dashboard', 'Drives', 'Dynamic', 'FCKeditor', 'Feedback', 
        'Files', 'Flash', 'Forms', 'Help', 'ICEcore', 'IO', 'Image', 'JPG', 
        'getold','JSP', 'KFSI', 'Laguna', 'Login', 'Motors', 'MultiSites', 
        'NR', 'OCodger', 'RSS', 'Safety', 'Smarty', 'Software', 'Static', 'Stress',
        'Sugarcrm', 'Travel', 'UPLOAD', 'Urussanga', 'UserFiles', '__tpl', 
        '_fckeditor', '_info', '_machine', '_plugins', '_sample', '_samples',
         'postmost','_source', '_testcases', 'aaa', 'abelardoluz', 'aberlardoluz', 
        'aborto', 'about', 'aboutus', 'abuse', 'abusers', 'ac_drives', 'acabamentos', 
        'mail','academias', 'acao', 'acartpro', 'acatalog', 'acc', 'acc_auto_del', 
        'acc_beep_ken', 'acc_beep_time', 'acc_ch_mail', 'acc_fc_prsc', 'accounts', 
        'validar','acc_html_mark', 'acc_html_rand', 'acc_lan_page', 'acc_pic_html', 
        'acc_profol', 'acc_soft_link', 'acc_ssd_page', 'acc_syun_ei', 'german', 
        'intranet', 'old','acc_time_go', 'acc_wbcreator', 'accept', 'accepted', 
        'acceso', 'access', 'accessibility', 'accessories', 'acciones', 'acclg', 
        'account', 'paste', 'paste22','acessorios', 'acontece', 'acougueiro', 
        'acoustic', 'act', 'action', 'activate', 'active', 'activeden', 'activism', 
        'actualit', 'actuators', 'ad', 'informatica','ad_division', 'ad_rate', 'adapter', 
        'adapters', 'adaptive', 'adaptivei', 'adatmentes', 'adbanner', 'adblock', 
        'adboard', 'adclick', 'add-ons', 'add', 'delete','added', 'addon', 'address', 
        'adduser', 'adfree', 'adhoc', 'adinfo', 'adios_papa', 'adlink', 'adlinks', 
        'acc_folder_vw', 'acc_syun_su'
    ];

    $locais = [
        'ac', 'ad', 'ae', 'af', 'ag', 'al', 'am', 'an', 'ao', 
        'aq', 'ar', 'as', 'at', 'au', 'aw', 'az', 'ba', 'bb', 
        'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bm', 'bn',
        'bw', 'by', 'bz', 'ca', 'cc', 'cd', 'cf', 'cg', 'ch', 
        'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cr', 'cu', 'cv', 
        'cx', 'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 
        'bo', 'br', 'ec', 'ee', 'eg', 'er', 'es', 'et', 'eu', 
        'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gb', 'gd', 
        'ge', 'gf', 'gg', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp',
        'gs', 'gt', 'gu', 'gw', 'gy', 'hk', 'hm', 'hn', 'hr', 
        'ht', 'hu', 'id', 'ie', 'il', 'im', 'in', 'io', 'iq', 
        'ir', 'is', 'it', 'je', 'jm', 'jo', 'jp', 'ke', 'kg', 
        'kh', 'ki', 'km', 'kn', 'kr', 'kw', 'ky', 'kz', 'la', 
        'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 
        'ly', 'ma', 'mc', 'md', 'me', 'mg', 'mh', 'mk', 'ml',
        'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mu', 
        'mv', 'mw', 'mx', 'my', 'mz', 'nb', 'nc', 'ne', 'nf', 
        'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nu', 'nz', 'om',
        'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn', 
        'pr', 'ps', 'pt', 'pw', 'py', 'qa', 're', 'ro', 'ru', 
        'rw', 'sa', 'sb', 'sc', 'sd', 'se', 'sg', 'sh', 'si',
        'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'ss', 'st', 
        'su', 'sv', 'sy', 'sz', 'tc', 'td', 'tf', 'tg', 'th', 
        'tj', 'tk', 'tl', 'tm', 'tn', 'to', 'tr', 'tt', 'tv',
        'tw', 'tz', 'ua', 'ug', 'uk', 'um', 'us', 'uy', 'uz', 
        'va', 'vc', 've', 'vg', 'vi', 'vn', 'vu', 'wf', 'ws', 
        'ye', 'yt', 'yu', 'za', 'zm', 'zw', 'ai'
    ];

    shuffle($dominio);
    shuffle($gTLD);
    shuffle($locais);
    shuffle($pasta);
    shuffle($arquivo);
    shuffle($ext);
    $domain_rand = "http://www.$dominio[0].$gTLD[0].$locais[0]/$pasta[0]/$arquivo[0].$ext[0]";
    return $domain_rand;

}