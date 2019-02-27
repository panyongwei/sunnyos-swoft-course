<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:12:22
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Models\Logic;

use App\Exception\ValidateException;
use App\Models\Validate\UserValidate;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;

/**
 * @Bean()
 */
class UserLogic
{
    /**
     * @Inject()
     * @var UserValidate
     */
    private $userValidate;

    /**
     * 创建用户
     * @param array $data
     * @throws ValidateException
     */
    public function create(array $data){
        if (!$this->userValidate->scene('create')->check($data)){
            throw new ValidateException($this->userValidate->getError());
        }
    }

    /**
     * 用户登陆
     * @param array $data
     * @throws ValidateException
     */
    public function login(array $data){
        if (!$this->userValidate->scene('login')->check($data)){
            throw new ValidateException($this->userValidate->getError());
        }
    }
}
