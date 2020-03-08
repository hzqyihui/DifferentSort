<?php

namespace Different;
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/8
 * Time: 17:00
 */
$a = 5;
echo $a >> 1;
die;

$testArray = [2, 12, 3, 23, 90];
//        dd($randNumber);
mergeSort($testArray, 0, count($testArray) - 1);
//        sort($result);
print_r($testArray);

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
    if (empty($array) || count($array) < 2) {
        return $array;
    }
    if ($left == $right) {
        return $array;
    }
    $mid        = intval(($right + $left) / 2);
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
    var_dump($newArr);
//    for ($i = 0; $i < count($newArr); $i++) {
//        $array[$i] = $newArr[$i];
//    }
    return $newArr;
}