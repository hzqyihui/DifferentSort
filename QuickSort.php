<?php
/**
 * =====================================================================================
 *
 *        Filename: QuickSort.php
 *
 *     Description:
 *
 *         Created: 2020-03-01 21:21:56
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */
require_once "Common.php";

/**
 * 不稳定排序， 但是可以做到稳定， 但是非常难 搜索“01 stable sort”
 */

$array = [1, 2, 8, 4, 6, 2, 3, 4, 9, 2, 0, 5, 6];
//$res   = quickSort($array);
//quickSortImprove($array, 0, count($array)-1);
dd($array);

/**
 * 经典快速排序
 *
 * @param array $array
 * @return array
 */
function quickSort($array = [])
{
    $length = count($array);
    if ($length < 2) {
        return $array;
    }
    //快排需要先设置一个基准值，这个基准值用于比较大小，这里我默认用的是第一个值，实际上可以选择中间的一个值，待考察
    $standard  = $array[0];
//    $standard  = mt_rand(0, count($array)-1); //有错
//    dd($standard);
    $leftArray = $rightArray = [];
    for ($i = 1; $i < $length; $i++) {
        //在这里我们开始比较，大于等于基准值的，放“右”数组，小于基准值的放“左”数组，整个循环下来，即完美分开数据
        if ($standard >= $array[$i]) {
            $leftArray[] = $array[$i];
        } else {
            $rightArray[] = $array[$i];
        }
    }
    //那么接下来就是使用递归的方式把左右数组给传入函数，最后会在递归的过程中从栈的顶层得到单个值的数组，利用array_merge组合左，基准，右数组，即可得到排序好的数组了
    $leftArray  = quickSort($leftArray);
    $rightArray = quickSort($rightArray);
    $result     = array_merge($leftArray, [$standard], $rightArray);
    return $result;
}

/**
 * 改进版快速排序，利用荷兰国旗问题， 代码暂时有误, 时间复杂度， O(N * Log N)， 空间复杂度， 最好 O(Log N)， 最差 O(N)
 * @param $array
 * @param $left
 * @param $right
 */
function quickSortImprove(&$array, $left, $right)
{
    //我们利用数组最右边的数，作为一个判定标准，利用递归，荷兰国旗问题，划分出小于这个值的区域和等于区域和大于区域。
    if ($left < $right) {
        //当左小于右，则说明仍然具有可比性，划分性，继续划分，继续比较
        $position = Netherlands($array, $left, $right);
        quickSortImprove($array, $left, $position[0] - 1);
        quickSortImprove($array, $position[1] + 1, $right);
    }
}

function Netherlands(&$array, $left, $right)
{
    //设定两个边界，分别是Less 和 More， less是 0下标的前一个边界， more 是最后一个下标，和原本的荷兰国旗问题有点区分。
    $less    = $left - 1;
    $more    = $right;
    $current = $left;
    while ($current < $more) {
        if ($array[$current] < $array[$more]) {
            //如果当前数据比 最右边的值 小，则替换当前值与less后一个位置的数进行交换，并让less加一个位置
            swapArray($array, $current++, ++$less);
        } elseif ($array[$current] > $array[$more]) {
            //如果当前值比 最右边的值 大，则交换当前值与More前面那个数，因为交换后，不知道后面那个数具体是什么，所以current不增加，进入下一轮比较
            swapArray($array, $current, --$more);
        } else {
            //如果相等，则不进行任何交换，直接指针往前移动
            $current++;
        }
    }
    //该句的意思是，由于More下标是不断 减减 的，最终会得到一个 中间是相同值的一个范围，这个值就是数组最右边的数，把more下标的值与其
    //交换，让中间相等的区域，形成完整的区域。
    swapArray($array, $more, $right);
    //返回中间值是相等的下标， 由于执行了上一步操作了，所以这里右边范围是More，是没问题的。
    return [$less + 1, $more];
}