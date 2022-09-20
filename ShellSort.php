<?php
/**
 * =====================================================================================
 *
 *        Filename: ShellSort.php
 *
 *     Description:
 *
 *         Created: 2020-03-01 22:22:01
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
require_once "Common.php";

function ShellSort(array $container)
{
    $count = count($container);
    for ($increment = intval($count / 2); $increment > 0; $increment = intval($increment / 2)) {
        for ($i = $increment; $i < $count; $i++) {
            $temp = $container[$i];
            for ($j = $i; $j >= $increment; $j -= $increment) {
                if ($temp < $container[$j - $increment]) {
                    $container[$j] = $container[$j - $increment];
                } else {
                    break;
                }
            }
            $container[$j] = $temp;
        }
    }
    return $container;
}