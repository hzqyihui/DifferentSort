<?php
/**
 * =====================================================================================
 *
 *        Filename: SelectSort.php
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

/**
 * 不稳定排序， 且做不到稳定性
 */

/**
 * 选择排序， 时间复杂度O(N^2)
 *
 * @param array $array
 * @return array
 */
function selectSort($array = [])
{
    //选择排序 非常类似于冒泡排序，了解了冒泡排序的原理后，再深入选择排序，这样才能更容易理解
    $length = count($array);
    if ($length < 2) {
        return $array;
    }

    //首先就是一个循环
    for ($i = 0; $i < $length - 1; $i++) {
        //设置一个基准下标，这个下标就是最小下标，假定第一个为$i
        $smallIndex = $i;
        //下面开始循环比较
        for ($j = $i + 1; $j < $length; $j++) {
            //此时，我们去比较$j对应的值与$smallIndex对应的值的大小
            if ($array[$j] < $array[$smallIndex]) {
                //只要遇到比当前smallIndex对应值小的，就重新赋值给smallIndex，以便循环的下一轮继续比较，最终得到外层一轮循环的最小值对应的下标
                $smallIndex = $j;
            }
        }

        //整个一轮比较完成后，就能得到最小值, 那么如果最小下标，与$i不相等了，则可以重新赋值
        if ($smallIndex != $i) {
            //此时的i下标，一直都是随着i增大而来，也就是0,1,2。。。
            $temp               = $array[$i];
            $array[$i]          = $array[$smallIndex];
            $array[$smallIndex] = $temp;
        }
        //此时下标为0的比较完，继续比较下一轮
    }
    return $array;
}
