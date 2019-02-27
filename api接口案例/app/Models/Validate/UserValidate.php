<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:24:41
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Models\Validate;

use App\Utils\Validate\Validate;
use Swoft\Bean\Annotation\Bean;

/**
 * @Bean()
 */
class UserValidate extends Validate
{
    protected $rule = [
        'mobile'=>'require|mobile',
        'code'=>'require|number',
        'passwd'=>'require',
        'passwds'=>'require|confirm:passwd'
    ];

    protected $message = [
        'mobile.require'=>'请输入手机号码',
        'mobile.mobile'=>'请输入正确手机号码',
        'code.require'=>'请输入验证码',
        'code.number'=>'验证码错误',
        'passwd.require'=>'请输入密码',
        'passwds.require'=>'请输入确认密码',
        'passwds.confirm'=>'两次密码不一致'
    ];

    protected $scene = [
        'create'=>['mobile','code','passwd','passwds'],
        'login'=>['mobile','passwd']
    ];
}
