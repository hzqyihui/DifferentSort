<?php
/**
 * =====================================================================================
 *
 *        Filename: BubbleSort.php
 *
 *     Description:
 *
 *         Created: 2020-03-01 22:22:00
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
require_once "Common.php";
/**
 * 稳定排序
 */

/**
 * 冒泡排序第一种写法， 复杂度， O(N^2)
 *
 * @param array $array
 * @return array
 */
function bubbleSortOne($array = [])
{
    $length = count($array);
    $i      = $j = 0;
    //冒泡排序，我认为是最简单的一种排序了，逻辑就在于两两比较，比较所得结果交换位置即可
    //该种方式是始终拿一个元素，去和其他的比较， 找出最小的，放在左边。然后进入下一轮
    for ($i = 0; $i < $length; $i++) {
        for ($j = $i + 1; $j < $length; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp      = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

/**
 * 冒泡排序第二种写法, 复杂度， O(aN^2+bN+1) -> O(N^2)
 *
 * @param array $array
 * @return array
 */
function bubbleSortTwo($array = [])
{
    $length = count($array);
    $i      = $j = 0;
    //总是把最大的先放在右边，下一轮就不比较已排好序的最大元素了
    for ($i = $length - 1; $i > 0; $i--) {
        for ($j = 0; $j < $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp          = $array[$j];
                $array[$j]     = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}