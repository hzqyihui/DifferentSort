<?php
/**
 * =====================================================================================
 *
 *        Filename: HeapSort.php
 *
 *     Description: 堆排序！！！！！堆 非常重要，非常重要，非常重要！！！三遍！！！
 *
 *         Created: 2020-03-06 21:21:56
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */

/**
 * 1. 可以解决的问题， 在一堆无序数字中，找出中位数来，如，先拿出一个数放入到大根堆里， 再取出一个数，若该数比大根堆堆顶的数小，则继续放
 * 入大根堆，之后注意，大根堆的 节点个数，若比小根堆大于1，则弹出大根堆的数到小根堆中，再进行heapify 操作，若取出的数比大根堆堆顶大，
 * 则放入小根堆，同理，随时比较大小根堆，个数差异。若小根堆多了，则弹出最小值到大根堆中，再进行heapify操作，最终大小根堆的堆顶，则可以
 * 求出中位数了。
 */
require_once "Common.php";

/**
 * 不稳定排序， 也做不到稳定
 */

$array = [1, 2, 8, 4, 6, 2, 3, 4, 9, 2, 0, 5, 6];
$res   = HeapSort($array);
dd($res);

/**
 * 堆排序， 时间复杂度， O(N * Log N)， 空间复杂度 O(1)
 */
function HeapSort($array)
{
    $length = count($array);
    //从数组生成大根堆的时间复杂度， 是 O(Log N)， 即你新加的节点，始终只会和你的高度上的沿途节点做比较。即每个节点都是 O(Log i)，
    //每个节点加起来 O(Log 1)+ O(Log 2)++++..... 最后得出为 O(N)
    for ($i = 0; $i < $length; $i++) {
        HeapInsert($array, $i);
    }
    //以下代码，即是假如我需要把，大根堆 堆顶的数弹出来， 我先让堆顶（也就是数组下标0的值）与最后一个下标交换，
    //此时，就满足了heapify函数的功能， 若某个值发生了改变，则继续生成大根堆，同时交换后的最后一个值，不是大根堆中的叶节点，所以
    //heapSize 为 --$length
//    swapArray($array, 0, --$length);
//    heapify($array, 0, --$length);

    //可以利用以上注释的代码原理，我可以利用大根堆实现一个从小到大排序的数组，
    $headSize = $length;
    swapArray($array, 0, --$headSize);   //先交换下
    while($length > 0){
        //重新生成大根堆
        heapify($array, 0, $headSize);
        //我又把重新生成后的大根堆，把堆顶元素和堆元素最大长度的最后一个值交换，迭代下来。就是一个从小到大的数组了。
        swapArray($array, 0, --$headSize);
    }
    return $array;
}

/**
 * 数组首先先变成大根堆（大根堆： 首先是一颗完全二叉树，树中任意一颗子树的父节点都比孩子节点大）， 可以用引用也可以，传返回值
 * @param $array
 * @param $position
 */
function HeapInsert(&$array, $position)
{
    while ($array[$position] > $array[intval(($position - 1) / 2)]) {
        swapArray($array, $position, intval(($position - 1) / 2));
        $position = intval(($position - 1) / 2);
    }
//    return $array;
}

/**
 * 该函数就是作为， 在一个已经有大根堆的数组中，其中某个值变化了， 需要重新生成大根堆的函数。
 * @param $array
 * @param $index
 * @param $heapSize
 */
function heapify(&$array, $index, $heapSize)
{
    $left = 2 * $index + 1;
    while ($left < $heapSize) {
        //通过此句，获得左右孩子比较后，值最大的那个下标，$left + 1 < $heapSize 判断，没有超过大根堆的边界。
        $biggestIndex = $left + 1 < $heapSize && $array[$left + 1] > $array[$left] ? $left + 1 : $left;
        //通过此句，与自己比较，获取最大值的那个下标。
        $biggestIndex = $array[$biggestIndex] > $array[$index] ? $biggestIndex : $index;
        if ($biggestIndex == $index) {
            break;
        }
        swapArray($array, $index, $biggestIndex);
        $index = $biggestIndex;
        $left = $index * 2 + 1;
    }
}