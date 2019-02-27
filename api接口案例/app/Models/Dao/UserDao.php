<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:11:23
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Models\Dao;

use App\Models\Entity\User;
use App\Models\Entity\UserInfo;
use Swoft\Bean\Annotation\Bean;

/**
 * @Bean()
 */
class UserDao
{
    /**
     * 创建用户
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $user = new User();
        $userId = $user->fill($data)->save()->getResult();

        $userInfo = new UserInfo();
        $userInfo->setUser($userId)->save()->getResult();

        return $userId;
    }

    /**
     * 获取用户信息
     * @param string $mobile
     * @return mixed
     */
    public function getUserByMobile(string $mobile){
        return User::findOne(['mobile'=>$mobile])->getResult();
    }
}
