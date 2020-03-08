<?php
/**
 * =====================================================================================
 *
 *        Filename: InsertSort.php
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
 * 稳定排序
 */

/**
 * 插入排序， 类似于扑克牌的整理牌 的顺序一样
 * 复杂度与数据本身有关， 所以他的排序复杂度是不一定的，若原数组，是从小到大已经排好序的，则复杂度为 O(N)， 若是无序的，或
 * 从大到小排序的，需要排成从小到大的，则复杂度为O(N^2)
 *
 * @param array $array
 * @return array
 */
function insertSort($array = [])
{
    $length = count($array);
    if ($length < 2) return $array;
    //先比较头两个数，所以$i先置为1， 后面慢慢的增加
    for ($i = 1; $i < $length; $i++) {
        //第一轮，先比较头两个数， 比较完后，第二轮头三个数，数小的排在前面。以此类推。
        //他和冒泡的区别就在于， 这个排序是先形成一个已经排好序的区域，再慢慢的增大这个区域，也就是外层循环。
        //而冒泡是 首轮就是最大范围，之后逐渐递减，然后从第一个开始，慢慢的两两比较，然后把最大值给冒到数组后面去。
        for ($j = $i - 1; $j >= 0 && $array[$j] > $array[$j + 1]; $j--) {
//                $array[$i] = $array[$i] ^ $array[$j];
//                $array[$j] = $array[$i] ^ $array[$j];
//                $array[$i] = $array[$i] ^ $array[$j];
            $temp      = $array[$i];
            $array[$i] = $array[$j];
            $array[$i] = $temp;
        }
    }
    return $array;
}
