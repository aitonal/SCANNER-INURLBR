<?php


function __waitForFibers(array &$fiberList, ?int $completionCount = null) : array{
    $completedFibers = [];
    $completionCount ??= count($fiberList);
    while (count($fiberList) && count($completedFibers) < $completionCount){
        usleep(100);
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