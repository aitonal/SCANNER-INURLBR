<?php

function __command_replace($exploit, $url) {
        $cor = $GLOBALS['COR'];    
        $exploit_ = strstr($_SESSION['config']['replace'], '[INURL]') ? $exploit :
                __getOut( "{$cor->whit}[ INF ]{$cor->end}{$cor->red2}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$cor->end}".PHP_EOL);
        $exploit = explode("[INURL]", $exploit_);
        $exploit[0] = (isset($exploit[0]) && !is_null($exploit[0])) ? $exploit[0] :
                __getOut( "{$cor->whit}[ INF ]{$cor->end}{$cor->red2}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$cor->end}".PHP_EOL);
        $exploit[1] = (isset($exploit[0]) && !is_null($exploit[1])) ? $exploit[1] :
                __getOut( "{$cor->whit}[ INF ]{$cor->end}{$cor->red2}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$cor->end}".PHP_EOL);
        return str_replace($exploit[0], $exploit[1], $url);
}

function __replace_url_value($url){
        # http://click.hotbusca.com/clk.php?url=https://groups.drupal.org/node/477438
        return str_replace('http://click.hotbusca.com/clk.php?url=','',$url);
}