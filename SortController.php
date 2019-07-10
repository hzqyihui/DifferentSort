<?php
namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 2019/7/8
 * Time: 17:00
 */
Class SortController extends Controller{


    public function __construct()
    {

    }

    public function testSort()
    {
        $testArray = [2,12,3,23,90,340];
        $result = range(234234,234999);
//        dd($randNumber);
        echo time();
        $result = $this->quickSort($result);
//        sort($result);
        print_r($result);
        echo time();
    }

    /**
     * 快速排序
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
        //快排需要先设置一个基准值，这个基准值用于比较大小，这里我默认用的是第一个值，实际上可以选择中间的一个值
        $standard  = $array[0];
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
        $leftArray  = $this->quickSort($leftArray);
        $rightArray = $this->quickSort($rightArray);
        $result     = array_merge($leftArray, [$standard], $rightArray);
        return $result;
    }

    /**
     * 冒泡排序
     *
     * @param array $array
     * @return array
     */
    function bubbleSort($array = [])
    {
        $length = count($array);
        $i      = $j = 0;
        //冒泡排序，我认为是最简单的一种排序了，逻辑就在于两两比较，比较所得结果交换位置即可
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

    private $test = [1,5,2,3,7,5];

    /**
     * 选择排序
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
        for ($i = 0; $i < $length; $i++) {
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

}