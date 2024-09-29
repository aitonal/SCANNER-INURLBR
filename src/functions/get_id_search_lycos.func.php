<?php

################################################################################
#CAPTURE ID KEY TO SEARCH LYCOS MAKE############################################
################################################################################
function __getIdSearchLycos($html): bool|string{
    if(__not_empty($html)):
        $match = null;
        preg_match_all('/((name="keyvol".*.(value=".*.")..>)$)/isxm', $html, $match);
        $result = str_replace('"','', $match[0][0]);
        $result = trim(string: explode("name=keyvol",$result)[1]);
        $result = trim(str_replace(['value=','/>'],'', $result));
        return $result;
    endif;
    return false;
}