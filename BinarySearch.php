<?php


require_once "Common.php";
/**
 * 非递归版 二分查找
 *
 * @param array $container
 * @param       $search
 * @return int|string
 */
function BinaryQuery(array $container, $search)
{
    $top = count($container);
    $low = 0;
    while ($low <= $top) {
        $mid = intval(floor(($low + $top) / 2));
        if (!isset($container[$mid])) {
            return '没找着哦';
        }
        if ($container[$mid] == $search) {
            return $mid;
        }
        $container[$mid] < $search && $low = $mid + 1;
        $container[$mid] > $search && $top = $mid - 1;
    }
}

/**
 * 递归版 二分查找
 *
 * @param array  $container
 * @param        $search
 * @param int    $low
 * @param string $top
 * @return int|string
 */
function BinaryQueryRecursive(array $container, $search, $low = 0, $top = 'default')
{
    $top === 'default' && $top = count($container);
    if ($low <= $top) {
        $mid = intval(floor($low + $top) / 2);
        if (!isset($container[$mid])) {
            return '没找着哦';
        }
        if ($container[$mid] == $search) {
            return $mid;
        }
        if ($container[$mid] < $search) {
            return BinaryQueryRecursive($container, $search, $mid + 1, $top);
        } else {
            return BinaryQueryRecursive($container, $search, $low, $mid - 1);
        }
    }
}