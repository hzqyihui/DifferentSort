<?php
/**
 * =====================================================================================
 *
 *        Filename: MergeSort.php
 *
 *     Description:
 *
 *         Created: 2020-03-01 21:21:59
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
require_once "Common.php";

/**
 * 可以做到稳定性，即稳定排序， 额外空间复杂度可以变成 O(1)，非常难， 搜索 “归并排序 内部缓存法”
 */

/**
 * 归并排序 时间复杂度： O(N*logN)
 *
 * @param array $array
 * @param $left
 * @param $right
 * @return array
 */
function mergeSort($array = [], $left, $right)
{
    $length = count($array);
    if (empty($array) || $length < 2) {
        return $array;
    }
    if ($left == $right) {
        return $array;
    }
    $mid        = ($right + $left) / 2;
    $leftArray  = mergeSort($array, $left, $mid);
    $rightArray = mergeSort($array, $mid + 1, $right);
    return mergeSortHelper(array_merge($leftArray, $rightArray), 0, $mid, $right);
}

function mergeSortHelper($array, $left, $mid, $right)
{
    $p1     = $left;
    $p2     = $mid + 1;
    $i      = 0;
    $newArr = [];
    while ($p1 <= $mid && $p2 <= $right) {
        $newArr[$i++] = $array[$p1] < $array[$p2] ? $array[$p1++] : $array[$p2++];
    }
    while ($p1 <= $mid) {
        $newArr[$i++] = $array[$p1++];
    }
    while ($p2 <= $right) {
        $newArr[$i++] = $array[$p2++];
    }
    for ($i = 0; $i < count($newArr); $i++) {
        $array[$i] = $newArr[$i];
    }
    return $array;
}