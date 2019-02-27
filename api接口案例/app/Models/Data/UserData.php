<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:12:11
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Models\Data;

use App\Models\Entity\UserInfo;
use Swoft\Bean\Annotation\Bean;

/**
 * @Bean()
 */
class UserData extends Repository
{
    /**
     * 获取用户信息
     * @param int $userId
     * @return bool|\Closure|string
     */
    public function getUserInfo(int $userId)
    {
        return $this->setModel(new UserInfo())
            ->setTag("userInfo")
            ->remeber($this->getTag() . ":" . $userId, function () use ($userId) {
                return $this->getModel()::findOne(['user' => $userId])->getResult();
            });
    }
}
