<?php
/**
 * =====================================================================================
 *
 *        Filename: Common.php
 *
 *     Description:
 *
 *         Created: 2020-01-12 18:18:24
 *
 *          Author: huazhiqiang
 *
 * =====================================================================================
 */

/**
 * 打印数据并停止运行
 *
 * @param array $params
 */
function dd($params = [])
{
    var_dump($params);
    die;
}

/**
 * 交换数组中下标的数据
 * @param $array
 * @param $one
 * @param $two
 */
function swapArray(&$array, $one, $two)
{
    $temp        = $array[$one];
    $array[$one] = $array[$two];
    $array[$two] = $temp;
}

/**
 * 交换数据
 * @param $one
 * @param $two
 */
function swap(&$one, &$two)
{
    $temp = $one;
    $one  = $two;
    $two  = $temp;
}