<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:16:02
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Utils;


class Message
{
    const CODE_SUCCESS = 100;
    const CODE_ERROR = 101;

    public static function success($msg = 'success', $code = self::CODE_SUCCESS, $data = [])
    {
        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }

    public static function error($msg = 'error', $code = self::CODE_ERROR, $data = [])
    {
        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }
}
