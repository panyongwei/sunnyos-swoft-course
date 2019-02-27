<?php
/**
 * +----------------------------------------------------------------------
 * | 公共函数库
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:06:42
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

/**
 * 生成随机数
 */
if (!function_exists('randNum')) {
    function randNum($len = 4)
    {
        $chars = '1234567890';
        $string = '';
        for ($i = 0; $i < $len; $i++) {
            $rand = rand(0,strlen($chars)-1);
            $string .= substr($chars,$rand,1);
        }
        return $string;
    }
}
