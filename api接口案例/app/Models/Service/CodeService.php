<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:13:54
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Models\Service;

use App\Exception\ServiceException;
use App\Utils\Validate\Validate;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;
use Swoft\Redis\Redis;

/**
 * @Bean()
 */
class CodeService
{
    /**
     * @Inject()
     * @var Redis
     */
    private $redis;

    /**
     * 获取验证码
     * @param string $mobile
     * @return mixed
     * @throws ServiceException
     */
    public function getCode(string $mobile)
    {
        $key = "code:{$mobile}";
        $ttl = 120;
        $this->checkMobile($mobile);
        $code = randNum();

        $second = $this->redis->ttl($key);
        if ($second > 0) {
            throw new ServiceException("请在{$second}秒后再获取验证码", ['time' => $second]);
        }
        $this->redis->set($key, $code, $ttl);

        // 验证码发送，可以使用异步
        return $ttl;
    }


    /**
     * 验证验证码
     * @param string $mobile
     * @param string $code
     * @throws ServiceException
     */
    public function checkCode(string $mobile, string $code)
    {
        $key = "code:{$mobile}";
        $val = $this->redis->get($key);
        if ($val!=$code){
            throw new ServiceException('验证码错误');
        }
    }

    /**
     * 检查手机号码
     * @param string $mobile
     * @throws ServiceException
     */
    public function checkMobile(string $mobile)
    {
        $rule = [
            'mobile' => 'require|mobile',
        ];
        $msg = [
            'mobile.require' => '请输入手机号码',
            'mobile.mobile' => '请输入正确手机号码'
        ];

        $validate = Validate::make($rule)->message($msg);
        $validate->rule($rule);
        $result = $validate->check(['mobile' => $mobile]);
        if (!$result) {
            throw new ServiceException($validate->getError());
        }
    }
}
