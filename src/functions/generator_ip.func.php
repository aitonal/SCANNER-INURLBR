<?php

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